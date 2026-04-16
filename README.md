# Actividad 1 — Carlos Sanchez

Sitio web personal hecho con HTML, CSS y PHP como parte de una actividad de desarrollo web.
Corre localmente en XAMPP (Apache + MySQL).

Video Explicativo: 
https://www.loom.com/share/f0be0f68f1014eab8c24a338c830c42b

## Stack

- **HTML5** — estructura semántica (`<header>`, `<main>`, `<section>`, `<footer>`)
- **CSS3** — una sola hoja de estilos (`assets/style/style.css`)
- **PHP 8** — renderizado del lado del servidor y API tipo REST
- **MySQL** — base de datos `actividad1`, tabla `registros` (id, titulo, categoria, asignado)
- **JavaScript (Fetch API)** — operaciones CRUD asíncronas sin recargar la página
- **PDO** — consultas parametrizadas para prevenir inyección SQL

## Páginas

| Archivo | Descripción |
|---|---|
| `index.html` | Inicio — presentación y perfil |
| `listas.html` | Práctica con listas HTML |
| `peliculas.html` | Películas favoritas |
| `series.html` | Series favoritas |
| `sobre_mi.html` | Información personal |
| `tablas.html` | Práctica con tablas HTML |
| `formulario.php` | Formulario de contacto con validación JS del lado del cliente |
| `crud.php` | Tabla generada en el servidor con `foreach` de PHP |

## Backend

### `api.php`
Endpoint tipo REST que recibe una solicitud `POST` con un campo `action` y responde en JSON.

| Acción | SQL | Descripción |
|---|---|---|
| `read` | `SELECT` | Retorna todas las filas de `registros` ordenadas por `id` |
| `create` | `INSERT` | Inserta un nuevo registro; retorna el `id` generado |
| `update` | `UPDATE` | Actualiza un registro existente por `id` |
| `delete` | `DELETE` | Elimina un registro por `id` |

La entrada se sanitiza con `htmlspecialchars()` + `trim()`. Todas las consultas usan prepared statements de PDO.

### `php/logica.php`
Maneja el envío tradicional del formulario desde `formulario.php` (POST, lado del servidor).

## Configuración local

1. Instalar [XAMPP](https://www.apachefriends.org/)
2. Clonar o copiar esta carpeta dentro de `htdocs/`
3. Iniciar **Apache** y **MySQL** desde el Panel de Control de XAMPP
4. En phpMyAdmin, crear la base de datos y la tabla:

```sql
CREATE DATABASE actividad1;
USE actividad1;

CREATE TABLE registros (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    titulo    VARCHAR(255) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    asignado  VARCHAR(100) NOT NULL
);
```

5. Abrir `http://localhost/actividad%201/` en el navegador
