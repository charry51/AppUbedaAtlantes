# 🏉 Web Oficial - Club de Rugby Úbeda Atlantes

> Plataforma web integral desarrollada a medida para la captación de jugadores, gestión de información y visibilidad del Club de Rugby Úbeda Atlantes.

Este proyecto no es solo una página informativa ("landing page"), sino una **Aplicación Web Completa** con panel de administración privado, base de datos y sistema de reclutamiento dinámico.

---

## 🚀 Características Principales

* **Frontend Atractivo y Responsivo:** Diseño adaptado a móviles y escritorio, con modo claro/oscuro dinámico.
* **Sistema de Reclutamiento (Embudo de conversión):** Formulario de captación conectado a la base de datos para registrar nuevos jugadores según su experiencia.
* **Panel de Administración (Backend):** Zona privada segura (requiere login) para el "Míster" o la directiva del club.
* **Gestor de Partidos:** Visualización dinámica del próximo encuentro, donde el administrador puede actualizar fecha, rival y ubicación en tiempo real.
* **Arquitectura Escalable:** Preparado para futuras implementaciones (Tienda online, Galería histórica por temporadas, Gestión de cuotas).

---

## 🛠️ Tecnologías Utilizadas

* **Framework Backend:** Laravel (PHP 8.4+)
* **Frontend:** Blade, HTML5, CSS3 avanzado (Variables nativas, Flexbox, Grid)
* **Base de Datos:** MySQL / SQLite
* **Autenticación:** Sistema de seguridad y login nativo de Laravel
* **Control de Versiones:** Git & GitHub

---

## ⚙️ Instalación en local (Para desarrolladores)

Si deseas clonar y ejecutar este proyecto en tu propia máquina, sigue estos pasos:

1. Clona el repositorio:
   ```bash
   git clone [https://github.com/charry51/AppUbedaAtlantes.git](https://github.com/charry51/AppUbedaAtlantes.git)
   ```
2. Instala las dependencias de PHP:
   ```bash
   composer install
   ```
3. Configura el entorno:
   * Copia el archivo `.env.example` y renómbralo a `.env`.
   * Configura tu conexión a la base de datos dentro del `.env`.
4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
5. Ejecuta las migraciones (para crear las tablas en tu base de datos):
   ```bash
   php artisan migrate
   ```
6. Inicia el servidor local:
   ```bash
   php artisan serve
   ```

---

## 👨‍💻 Autor

**Francisco Charriel Romero**

* **LinkedIn:** [Pega aquí tu enlace de LinkedIn]
* **GitHub:** [https://github.com/charry51](https://github.com/charry51)

*Proyecto desarrollado como solución tecnológica integral para entidades deportivas locales.*
