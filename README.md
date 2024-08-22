# Bienes Raíces

![Licencia MIT](https://img.shields.io/badge/licencia-MIT-blue.svg)
![Estado del Proyecto](https://img.shields.io/badge/estado-finalizado-green.svg)
![Versión](https://img.shields.io/badge/versión-1.0.0-brightgreen.svg)
[![MIT License](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**Bienes Raíces** es una plataforma web diseñada para la gestión y presentación de propiedades inmobiliarias. Ofrece una interfaz intuitiva para explorar listados de propiedades, obtener información detallada sobre cada una y facilitar el contacto entre compradores potenciales y la agencia.

## 🚀 Descripción

El proyecto incluye:

- **Listado de Propiedades:** Muestra las propiedades disponibles con detalles básicos.
- **Páginas de Detalles:** Información completa sobre cada propiedad.
- **Formulario de Contacto:** Permite a los usuarios enviar mensajes directamente desde la plataforma.
- **Sección de Blog:** Artículos relacionados con el mercado inmobiliario.
- **Diseño Responsivo:** Optimizado para una experiencia de usuario fluida en dispositivos móviles y de escritorio.

## 🛠️ Tecnologías Utilizadas

- **PHP**: Backend y lógica del servidor.
- **MySQL**: Base de datos para almacenar información de propiedades y usuarios.
- **HTML/CSS**: Estructura y estilos de la interfaz de usuario.
- **JavaScript**: Interactividad en el lado del cliente.
- **PHPMailer**: Para el envío de correos electrónicos desde el formulario de contacto.

## 🏗️ Instalación

Para ejecutar este proyecto localmente, sigue estos pasos:

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/tuusuario/bienes-raices.git
   ```

2. **Configura la base de datos**:
   - Crea una base de datos MySQL.
   - Importa el archivo SQL proporcionado en la carpeta `database`.

3. **Configura el entorno**:
   - Copia el archivo `.env.example` a `.env`.
   - Actualiza las variables de entorno con tus credenciales de base de datos y configuración de correo.

4. **Instala las dependencias**:
   ```bash
   composer install
   ```

5. **Inicia el servidor local**:
   ```bash
   php -S localhost:8000 -t public
   ```

6. **Accede a la aplicación** en tu navegador visitando `http://localhost:8000`.

## 🖥️ Uso

- **Explorar Propiedades:** Navega por el listado de propiedades disponibles.
- **Ver Detalles:** Haz clic en una propiedad para ver información detallada.
- **Contacto:** Utiliza el formulario de contacto para enviar mensajes a la agencia.
- **Blog:** Lee artículos relacionados con el mercado inmobiliario en la sección de blog.

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Si deseas contribuir, sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tus cambios.
3. Realiza tus cambios y haz commit.
4. Envía un pull request con una descripción detallada de tus modificaciones.

## 👤 Autor

Este proyecto fue creado y es mantenido por [LatinGladiador](https://github.com/LatinGladiador).

## 📜 Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

