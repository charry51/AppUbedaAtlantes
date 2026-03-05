# 🏉 Web Oficial - Club de Rugby Úbeda Atlantes

Plataforma web integral desarrollada a medida para la captación de jugadores, gestión de información y visibilidad del Club de Rugby Úbeda Atlantes.

Este proyecto no es solo una página informativa ("landing page"), sino una **Aplicación Web Completa** con panel de administración privado, base de datos y sistema de reclutamiento dinámico.

## 🚀 Características Principales

* **Frontend Avanzado:** Diseño Premium con efectos *Glassmorphism*, sombras reactivas, y microanimaciones (*Scroll Reveal*, *Fade In*, *Ken Burns*) usando CSS nativo. Adaptado a móviles y con modo claro/oscuro dinámico.
* **Sistema de Reclutamiento (Embudo de conversión):** Formulario de captación conectado a la base de datos para registrar nuevos jugadores según su experiencia.
* **Panel de Administración (Backend):** Zona privada segura para la directiva del club.
* **Gestor de Partidos:** Visualización dinámica del próximo encuentro en el "Hero" de la página.
* **CMS Integrado (Blog y Galería):** Gestor de contenidos dinámico para publicar noticias y un álbum fotográfico, todo desde el panel de control.
* **Preparada para Despliegue:** Incluye preconfiguración (`.htaccess`) para despliegues instantáneos en hostings compartidos tradicionales.
* **Arquitectura Escalable:** Preparado para futuras implementaciones (Tienda online enlazada a pasarela externa, Gestión de cuotas).

## 🛠️ Tecnologías Utilizadas

* **Framework Backend:** Laravel (PHP 8.4+)
* **Frontend:** Blade, HTML5, CSS3 avanzado (Variables nativas, Flexbox, Grid)
* **Base de Datos:** MySQL / SQLite
* **Autenticación:** Sistema de seguridad y login nativo de Laravel
* **Control de Versiones:** Git & GitHub

## ⚙️ Instalación en local (Para desarrolladores)

Si deseas clonar y ejecutar este proyecto en tu propia máquina, sigue estos pasos:

1. **Clona el repositorio:**
   `git clone https://github.com/charry51/AppUbedaAtlantes.git`

2. **Instala las dependencias de PHP:**
   `composer install`

3. **Configura el entorno:**
   Copia el archivo `.env.example` y renómbralo a `.env`. Configura tu conexión a la base de datos dentro del archivo `.env`.

4. **Genera la clave de la aplicación:**
   `php artisan key:generate`

5. **Ejecuta las migraciones** (para crear las tablas en tu base de datos):
   `php artisan migrate`

6. **Crea el enlace simbólico para las imágenes** (Necesario para que carguen las fotos del Blog y la Galería):
   `php artisan storage:link`

7. **Inicia el servidor local:**
   `php artisan serve`

---

## 👨‍💻 Autor

**Francisco Charriel Romero**
* **LinkedIn:** [www.linkedin.com/in/fcharriel](https://www.linkedin.com/in/fcharriel)
* **GitHub:** [https://github.com/charry51](https://github.com/charry51)

*Proyecto desarrollado como solución tecnológica integral para entidades deportivas locales.*
