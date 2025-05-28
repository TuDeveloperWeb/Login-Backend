# ⚙️ Backend Laravel - API para Sistema de Autenticación
## 📦 Requisitos

Antes de comenzar, asegúrate de tener instalado:

- PHP >= 8.2
- Composer
- MySQL
- Node.js

# Paso 1
Instalar las dependencias
- composer install

# Paso 2
Configurar variables de entorno (.env)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_bd
DB_USERNAME=usuario
DB_PASSWORD=contraseña

SANCTUM_STATEFUL_DOMAINS=localhost:5173 (Ruta del front Vue.js)
SESSION_DOMAIN=localhost

# Paso 3
Generar la clave de la app
- php artisan key:generate

# Paso 4
Ejecutar las migraciones 
- php artisan migrate

# Paso 5
Ejecutar los seeder ( Para tener dos usuarios de prueba admin@gmail.com  contraseña : admin123  y  student@gmail.com contraseña :  student123) ya que tienen roles distintos
- php artisan db:seed 

# Paso 6
Ejecutar el servidor local 
- php artisan serve

