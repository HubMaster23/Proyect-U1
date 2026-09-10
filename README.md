# 狐 Kitsune Store

Proyecto Unidad 1 — Sistema de autenticación y simulación de e-commerce con PHP.

## Credenciales

- Administrador: `administrador` / `asd`
- Cliente: `cliente` / `123`

## Requisitos

- PHP 8.x recomendado
- Visual Studio Code
- Git
- Cuenta de GitHub
- Ngrok para publicar temporalmente

## Ejecutar localmente

Abre una terminal dentro de la carpeta del proyecto y ejecuta:

```bash
php -S localhost:8000
```

Después abre:

http://localhost:8000

## Estructura

- `index.php` — inicio de sesión
- `login.php` — validación PHP
- `dashboard.php` — panel de administrador + gráfica
- `catalogo.php` — catálogo
- `agregar.php` — agrega productos al carrito
- `carrito.php` — resumen y total
- `logout.php` — cierre de sesión
- `error.php` — página de error
- `includes/data.php` — productos sin base de datos
- `includes/header.php` / `footer.php` — estructura compartida
- `assets/css/style.css` — diseño
- `assets/img/` — imágenes locales en SVG

## Ngrok

Con el servidor PHP local ejecutándose, abre otra terminal y usa:

```bash
ngrok http 8000
```

Ngrok mostrará una URL pública temporal. Esa URL es la que puedes usar para las capturas de evidencia.
