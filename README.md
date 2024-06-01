## Acerca

Este proyecto pretende ser el sistema de administración de información del CIIEA, ubicado en Teapa, Tabasco.

## Software

Stack Laravel - Inertia - Vue

-   Laravel 10
-   Inertia 1.0
-   VueJS 3

## Infraestructura

Se predente desplegar sobre un servidor montado en Linux

# ¿Cómo configurar el proyecto?

# 1. Clonar el repositorio de GitHub para este proyecto localmente

Si el proyecto está alojado en github, podemos usar git en su computadora local para clonarlo desde github a su computadora local.
Busque una ubicación en el equipo donde desee almacenar el proyecto. Puede cambiar el nombre de esta carpeta que crea, cambiando la última parte del fragmento de código a continuación para que coincida con el nombre que desea que se llame a su carpeta.

--git clone linkdelrepositorio.com/ projectName

Para obtener el enlace al repositorio, simplemente visite la página de github y haga clic en el botón verde "clonar o descargar" en el lado derecho. Esto revelará una URL que reemplazará en la parte linktogithub.com del fragmento anterior.
Una vez que esto se ejecute, tendrá una copia del proyecto en su computadora. 2. CD en tu proyecto
Deberá estar dentro de ese archivo de proyecto para ingresar el resto de los comandos. Así que recuerde escribir para mover la ubicación de trabajo de su terminal al archivo de proyecto que acabamos de crear. (Por supuesto, sustituya "projectName" en el comando anterior, con el nombre de la carpeta que creó en el paso anterior).

--cd projectName

# 3. Instalar dependencias de Composer

Cada vez que clones un nuevo proyecto, ahora debes instalar todas las dependencias del proyecto. Esto es lo que realmente instala Laravel, entre otros paquetes necesarios para comenzar.
Cuando ejecutamos composer, verifica el archivo que se envía al repositorio de github y enumera todos los paquetes de composer (PHP) que requiere su repositorio. Debido a que estos paquetes cambian constantemente, el código fuente generalmente no se envía a github, sino que dejamos que composer maneje estas actualizaciones. Así que para instalar todo este código fuente ejecutamos composer con el siguiente comando.

--composer install

# 4. Instalar dependencias de NPM

Al igual que debemos instalar los paquetes composer para avanzar, también debemos instalar los paquetes NPM necesarios para avanzar. Esto instalará Vue.js, Bootstrap.css, Lodash y Laravel Mix.
Esto es como el paso 4, donde instalamos los paquetes PHP del compositor, pero se requiere la instalación de los paquetes de Javascript (o Node). La lista de paquetes que requiere un repositorio se muestra en el archivo que se envía al repositorio de github. Al igual que en el paso 4, no confirmamos el código fuente de estos paquetes en el control de versiones (github) y, en su lugar, dejamos que NPM lo maneje.packages.json

--npm install

# 5. Crea una copia de tu archivo .env

.env Por lo general, los archivos no se confirman en el control de código fuente por motivos de seguridad. Pero hay un que es una plantilla del archivo que el proyecto espera que tengamos. Así que haremos una copia del archivo y crearemos un archivo que podemos empezar a rellenar para hacer cosas como la configuración de la base de datos en los siguientes pasos..

--cp .env.example .env

Esto creará una copia del archivo en su proyecto y le dará un nombre simplemente ..env.example.env

# 6. Genere una clave de cifrado de aplicaciones

El proyecto requiere que tengas una clave de cifrado de la aplicación que generalmente se genera aleatoriamente y se almacena en tu archivo. La aplicación usará esta clave de cifrado para codificar varios elementos de su aplicación, desde cookies hasta hashes de contraseña y más..env
En la terminal podemos ejecutar este comando para generar esa clave.

--php artisan key:generate

Si vuelve a comprobar el archivo, verá que ahora tiene una larga cadena aleatoria de caracteres en el campo. Ahora tenemos una clave de cifrado de aplicaciones válida.

# 7. Crear una base de datos vacía para nuestra aplicación

Crea una base de datos vacía para tu proyecto utilizando las herramientas de base de datos que prefieras. En nuestro ejemplo, creamos una base de datos llamada "test". Simplemente cree una base de datos vacía aquí, los pasos exactos dependerán de la configuración de su sistema.

# 8. En el archivo .env, agregue información de la base de datos para permitir que Laravel se conecte a la base de datos

Querremos permitir que se conecte a la base de datos que acabas de crear en el paso anterior. Para ello, debemos añadir las credenciales de conexión en el archivo .env.
En el archivo .env, rellene las opciones , , , y para que coincidan con las credenciales de la base de datos que acaba de crear. Esto nos permitirá ejecutar migraciones y sembrar la base de datos en el siguiente paso.

DB_HOSTDB_PORTDB_DATABASEDB_USERNAMEDB_PASSWORD

# 9. Migrar la base de datos

Una vez que sus credenciales estén en el archivo .env, ahora puede migrar su base de datos.

--php artisan migrate

No es una mala idea revisar su base de datos para asegurarse de que todo migró de la manera que esperaba.
