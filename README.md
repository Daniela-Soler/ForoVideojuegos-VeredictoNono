# ¡Bienvenido al repositorio oficial del Foro de Videojuegos! 
Sigue esta guía rápida para configurar tu entorno local y empezar a navegar en la comunidad en cuestión de minutos.

# Guía de Instalación
Sigue estos pasos detallados para poner en marcha la plataforma en tu ordenador:

## 1. Preparación del Entorno
Primero, necesitas un servidor local. Descarga e instala XAMPP desde el sitio oficial:
`🔗 apachefriends.org`

## 2. Obtención de los Archivos
Descarga el archivo comprimido *foro-videojuegos.zip*

- Descomprímelo en una ubicación de fácil acceso.

- Copia todos los archivos y carpetas extraídos.

## 3. Configuración en el Servidor
Ahora debemos mover el proyecto a la ruta donde XAMPP pueda ejecutarlo:

- Dirígete al directorio de instalación de XAMPP (por defecto es `C:\xampp`).

- Entra en la carpeta htdocs.

- Limpia la carpeta: Mover o eliminar los archivos que se encuentren en esta, ya que el proyecto presenta rutas absolutas.

- Pega aquí los archivos del proyecto que copiaste anteriormente.

## 4. Lanzamiento del Proyecto
Busca y abre el XAMPP Control Panel.

- En la sección de Actions, localiza el módulo de Apache.

- Haz clic en el botón Start.

- Una vez que el indicador se ponga en verde, haz clic en Admin.

## 5. Importar Base de Datos
Con la aplicación de XAMPP Control Panel abierta, haz lo siguiente:

- En la sección de Actions, localica el módulo de Apache.

- Haz clic en el botón Start.

- Una vez que el indicador se ponga en verde, haz clic en Admin.

- En mySql, crea una base de datos con el nombre `forovideojuegos`.

- Selecciona la base de datos y haz clic en Importar.

- Haz clic en Seleccionar Archivo.

- Busca dentro de la carpeta `data` del proyecto el archivo `forovideojuegos.sql`.

- Haz clic en Importar.

### 🏁 ¡Todo listo!
Si seguiste los pasos correctamente, tu navegador se abrirá automáticamente mostrando el sitio web y la base de datos.

# Aplicaciones futuras

- Filtrado de categorías al acceder desde la página principal del sitio y cualquier página específica de juego.

- Perfil del Gestor de contenidos para una mayor facilidad al agregar videojuegos a la plataforma.

- Agregar la funcionalidad de cambio de contraseña para el usuario.


**¡Bienvenido al foro, gamer!** \
*Que disfrutes la experiencia.*