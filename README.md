# User CRUD Application

Esta es una aplicación CRUD para la gestión de usuarios, construida con Laravel y Vite. Permite registrar, editar y eliminar usuarios, con validaciones para asegurar la integridad de los datos.

## Pasos para la instalación

### 1. Clonar el proyecto

Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/Harvey-46904/user-crud.git
cd user-crud/
```

### 2. Descargar dependencias

Instala las dependencias de Laravel y Node.js:

```bash
composer install
npm install
```

### 3. Compilar Vite

Compila los activos de Vite:

```bash
npm run build
```

### 4. Crear variables de entorno

Copia el archivo de ejemplo de variables de entorno para crear el archivo `.env`:

```bash
cp .env.example .env
```

Genera la clave de la aplicación:

```bash
php artisan key:generate
```

### 5. Configurar la base de datos

Crea una nueva base de datos en tu motor de base de datos y completa los campos de configuración en el archivo `.env`:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="nombre_base_de_datos"
DB_USERNAME="usuario"
DB_PASSWORD="contraseña"
```

### 6. Realizar migraciones

Ejecuta las migraciones para crear las tablas en la base de datos:

```bash
php artisan migrate
```

### 7. Generar datos de prueba

Genera datos de prueba predefinidos por la aplicación:

```bash
php artisan db:seed
```

Esto creará un usuario llamado Harvey para ingresar al sistema:
- **Correo:** harveympv33@gmail.com
- **Contraseña:** password

### 8. Iniciar el servidor

Inicia el servidor de desarrollo:

```bash
php artisan serve
```

Por lo general, este comando activa la aplicación en la siguiente URL:

[http://127.0.0.1:8000](http://127.0.0.1:8000)

Serás redirigido a la página de inicio de sesión, donde podrás ingresar con el usuario y contraseña previamente creados.

## Funcionalidades

La aplicación tiene las siguientes acciones:

1. Registrar un usuario.
2. Editar un usuario.
3. Eliminar un usuario.
4. Cerrar sesión desde el icono en la parte superior derecha.

## Validaciones

- Permite un correo electrónico único.
- No permite eliminar a la sesión actual y conserva al menos un usuario en el sistema.

## Notas

Asegúrate de tener instalados todos los requerimientos necesarios y de seguir cada paso con cuidado para evitar errores durante la instalación y configuración.


la url de ingreso es 
[https://moccasin-clam-649914.hostingersite.com/login](https://moccasin-clam-649914.hostingersite.com/login)
