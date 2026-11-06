# Veredicto Ñoño - Foro de Videojuegos 🎮

Plataforma web interactiva que centraliza información de videojuegos y permite a los usuarios gestionar perfiles, leer noticias y publicar valoraciones. Desarrollada con un enfoque fuerte en la seguridad del lado del servidor y la integridad de la base de datos.

## 🛠️ Stack Tecnológico
* **Frontend:** HTML5, CSS y JavaScript (Validaciones con Regex, renderizado dinámico del DOM y consumo de archivos JSON para el catálogo de juegos).
* **Backend:** PHP puro (Gestión de estado y variables de sesión).
* **Base de Datos:** MySQL / MariaDB (Servidor XAMPP).

## 🚀 Características Técnicas y Seguridad
* **Arquitectura de Base de Datos:** Modelo relacional implementando Procedimientos Almacenados (Stored Procedures) para todas las operaciones CRUD.
* **Seguridad Backend:** Uso de consultas parametrizadas (Prepared Statements) en PHP para neutralizar ataques de Inyección SQL.
* **Protección de Credenciales:** Implementación de algoritmos de Hashing para el almacenamiento seguro de contraseñas en la base de datos.
* **Manejo de Sesiones:** Control de acceso en rutas protegidas para garantizar que solo los autores puedan eliminar o modificar sus reseñas y perfiles.

---

## ⚙️ Guía de Instalación Local

### 1. Preparación del Entorno
* Descarga e instala XAMPP desde el sitio oficial: `apachefriends.org`.

### 2. Configuración en el Servidor
* Descarga y descomprime el archivo del proyecto.
* Dirígete al directorio de instalación de XAMPP (por defecto `C:\xampp\htdocs`).
* Limpia la carpeta `htdocs` (el proyecto utiliza rutas absolutas) y pega allí los archivos extraídos.

### 3. Importar Base de Datos
* Abre **XAMPP Control Panel** e inicia los módulos de **Apache** y **MySQL**.
* Haz clic en *Admin* en el módulo de MySQL para abrir phpMyAdmin.
* Crea una base de datos nombrada exactamente `forovideojuegos`.
* Ve a la pestaña Importar, busca el archivo `forovideojuegos.sql` dentro de la carpeta `data` del proyecto y ejecútalo.

### 🏁 Lanzamiento
Si los pasos se ejecutaron correctamente, al ingresar a `localhost` tu navegador mostrará el sitio web conectado a la base de datos.

---

## 🗺️ Aplicaciones Futuras (Roadmap)
* Implementación de filtrado de categorías dinámico desde la página principal y vistas específicas.
* Desarrollo de un panel de administrador (Gestor de Contenidos) para facilitar la inserción de nuevos videojuegos al catálogo.
* Módulo de recuperación y cambio de contraseña seguro para usuarios registrados.
