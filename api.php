<?php
/* ================================================================
   TABLA DE CONCEPTOS USADOS EN ESTE ARCHIVO
   ================================================================
   Concepto / Funcion        Funcion
   ──────────────────────   ──────────────────────────────────────
   define()                  Crea una constante con nombre y valor fijos que no cambian
   PDO                       PHP Data Objects: la capa que conecta PHP con la base de datos
   new PDO()                 Abre la conexion a MySQL usando host, nombre de BD, usuario y contrasena
   PDO::ATTR_ERRMODE         Configura como PHP reporta los errores de base de datos
   PDO::ERRMODE_EXCEPTION    Hace que los errores de BD lancen excepciones que se pueden atrapar
   PDOException              Tipo de error que PHP lanza cuando algo falla en la base de datos
   $pdo->query()             Ejecuta un SELECT simple que no necesita parametros externos
   $pdo->prepare()           Crea un prepared statement; los datos van separados del SQL (evita SQL injection)
   $stmt->execute()          Ejecuta el prepared statement enviando los valores como array
   $stmt->fetchAll()         Retorna todas las filas del resultado como un array
   PDO::FETCH_ASSOC          Hace que cada fila sea un array asociativo con nombres de columna como clave
   $pdo->lastInsertId()      Retorna el ID que MySQL asigno al registro recien insertado
   header('Content-Type')    Le dice al navegador que la respuesta es JSON, no HTML
   json_encode()             Convierte un array PHP a texto en formato JSON para enviarlo al navegador
   htmlspecialchars()        Convierte caracteres peligrosos (<>"&) en entidades HTML para evitar XSS
   http_response_code()      Establece el codigo de estado HTTP de la respuesta (ej: 400, 500)
   $_POST[]                  Array global de PHP que recibe los datos enviados por fetch() con POST
   isset()                   Verifica que una variable o clave exista y no sea null antes de usarla
   (int)                     Convierte un valor a numero entero; si es texto lo convierte a 0
   trim()                    Elimina los espacios en blanco al inicio y final del string
   ??                        Operador "null coalescing": devuelve el valor de la izquierda si existe,
                             o el de la derecha si no existe (evita errores por claves inexistentes)
   switch / case             Estructura que ejecuta codigo diferente segun el valor de una variable
   break                     Termina el case actual del switch para que no continue con el siguiente
   try / catch               Bloque que intenta ejecutar codigo y atrapa el error si algo falla
   exit                      Detiene completamente la ejecucion del script en ese punto
   ================================================================ */

/* ================================================================
   ARCHIVO: api.php
   API de CRUD que conecta PHP con MySQL via PDO.
   Recibe una accion por POST y responde en formato JSON.

   Acciones disponibles:
     read   → Retorna todos los registros de la tabla
     create → Inserta un nuevo registro
     update → Actualiza un registro existente por id
     delete → Elimina un registro por id
   ================================================================ */

// Le indica al navegador que la respuesta es JSON, no HTML
header('Content-Type: application/json');

// ── Configuracion de la base de datos ────────────────────────────────────────
// En produccion estos valores se guardarian en variables de entorno (.env)
// pero para este proyecto los definimos aqui directamente.
define('DB_HOST', 'localhost');  // Servidor de MySQL
define('DB_NAME', 'actividad1'); // Nombre de la base de datos (ver db_setup.sql)
define('DB_USER', 'root');       // Usuario de MySQL
define('DB_PASS', '');           // Contrasena de MySQL (vacia en XAMPP por defecto)

// ── Conexion a la base de datos via PDO ──────────────────────────────────────
// Usamos try/catch para atrapar errores de conexion y responder con JSON
// en lugar de mostrar un error PHP feo al usuario.
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            // Con ERRMODE_EXCEPTION, cualquier error de SQL lanza una excepcion
            // que podemos atrapar con catch en lugar de ignorarla silenciosamente
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (PDOException $e) {
    // Si no se puede conectar, respondemos con un error JSON y codigo 500
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexion a la base de datos. Verifica que MySQL este corriendo y que la base de datos actividad1 exista.']);
    exit;
}

// ── Lectura de la accion solicitada ──────────────────────────────────────────
// El JavaScript envia action=read|create|update|delete via FormData POST
// El operador ?? retorna '' si $_POST['action'] no existe (evita warnings)
$action = $_POST['action'] ?? '';

// ── Router de acciones ───────────────────────────────────────────────────────
switch ($action) {

    /* ── READ: retorna todos los registros ──────────────────────────────────
       No necesita datos del POST. Solo ejecuta el SELECT y devuelve JSON. */
    case 'read':
        $stmt = $pdo->query("SELECT id, titulo, categoria, asignado FROM registros ORDER BY id ASC");
        // FETCH_ASSOC retorna cada fila como array ['id'=>1, 'titulo'=>'...']
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    /* ── CREATE: inserta un nuevo registro ──────────────────────────────────
       Sanitiza los datos con htmlspecialchars() y los inserta via
       prepared statement para prevenir SQL injection. */
    case 'create':
        // Sanitizamos y limpiamos los datos de entrada
        $titulo    = htmlspecialchars(trim($_POST['titulo']    ?? ''), ENT_QUOTES, 'UTF-8');
        $categoria = htmlspecialchars(trim($_POST['categoria'] ?? ''), ENT_QUOTES, 'UTF-8');
        $asignado  = htmlspecialchars(trim($_POST['asignado']  ?? ''), ENT_QUOTES, 'UTF-8');

        // Validacion: todos los campos son obligatorios
        if (!$titulo || !$categoria || !$asignado) {
            echo json_encode(['error' => 'Todos los campos son requeridos.']);
            break;
        }

        // Prepared statement: los ? son placeholders que PDO reemplaza de forma segura
        // Esto previene SQL injection porque los valores NUNCA se concatenan al SQL
        $stmt = $pdo->prepare("INSERT INTO registros (titulo, categoria, asignado) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $categoria, $asignado]);

        // Retornamos el ID del registro recien insertado para que JS actualice la tabla
        echo json_encode([
            'success' => true,
            'id'      => (int) $pdo->lastInsertId()
        ]);
        break;

    /* ── UPDATE: actualiza un registro existente ────────────────────────────
       Valida que el id sea un entero positivo antes de ejecutar el UPDATE. */
    case 'update':
        // (int) castea el valor a entero. Si el valor es 'abc', se convierte a 0
        // y la validacion siguiente lo rechaza. Esto protege el campo id.
        $id        = (int) ($_POST['id'] ?? 0);
        $titulo    = htmlspecialchars(trim($_POST['titulo']    ?? ''), ENT_QUOTES, 'UTF-8');
        $categoria = htmlspecialchars(trim($_POST['categoria'] ?? ''), ENT_QUOTES, 'UTF-8');
        $asignado  = htmlspecialchars(trim($_POST['asignado']  ?? ''), ENT_QUOTES, 'UTF-8');

        // Validacion de datos antes de tocar la base de datos
        if (!$id || !$titulo || !$categoria || !$asignado) {
            echo json_encode(['error' => 'Datos invalidos para actualizar.']);
            break;
        }

        $stmt = $pdo->prepare("UPDATE registros SET titulo = ?, categoria = ?, asignado = ? WHERE id = ?");
        $stmt->execute([$titulo, $categoria, $asignado, $id]);
        echo json_encode(['success' => true]);
        break;

    /* ── DELETE: elimina un registro por id ─────────────────────────────────
       Solo necesita el id. Lo casteamos a entero por seguridad. */
    case 'delete':
        $id = (int) ($_POST['id'] ?? 0);

        if (!$id) {
            echo json_encode(['error' => 'ID invalido para eliminar.']);
            break;
        }

        $stmt = $pdo->prepare("DELETE FROM registros WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true]);
        break;

    /* ── DEFAULT: accion no reconocida ──────────────────────────────────── */
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Accion no reconocida: ' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8')]);
        break;
}