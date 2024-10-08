
## Instrucciones de Instalación

Sigue los siguientes pasos para configurar el proyecto en tu entorno local:



1. **Instala las dependencias de PHP y Node.js:**

   .Composer: Para instalar las dependencias de PHP, ejecuta:

        composer install

   .NPM: Para instalar las dependencias de Node.js, ejecuta:

        npm install
        npm run dev

2. **Configura el archivo de entorno .env:**

   .Copia el archivo .env.example a .env:

       cp .env.example .env
3. Nombre de la base de datos es "proyecto_prueba"

   .Genera la clave de la aplicación:

       php artisan key:generate

   .Configura la base de datos en el archivo .env. Asegúrate de tener una base de datos MySQL disponible y configurada.

4. **Ejecuta las migraciones y seeders para crear las tablas necesarias. Se crearon usuarios de prueba.:**

       php artisan migrate:fresh --seed
5. **Para la validación de contraseña es necesarion realizar las configuraciones de email en variables del .env correspondiente:**
   MAIL_MAILER=
   MAIL_HOST=
   MAIL_PORT=
   MAIL_USERNAME=
   MAIL_PASSWORD=

      



