# Proyecto eCommerce - Documentación

## Descripción
Este proyecto se enfoca en desarrollar un módulo básico para una plataforma de eCommerce, incluyendo tanto el frontend como el backend para permitir a los usuarios explorar productos.

## Estructura de Carpetas
- `app/`
  - `DAO/`: Contiene las clases para acceso a la base de datos.
  - `Http/Controllers/`: Aquí se encuentran las clases para la lógica de negocio y el manejo de las solicitudes HTTP.

- `routes/`
  - `web.php`: Definición de rutas para la interfaz de usuario.
  - `api.php`: Rutas destinadas a ser consumidas por una API.

## Supuestos y Decisiones Importantes
Durante el desarrollo, se tomaron en cuenta varios supuestos y decisiones cruciales:
- **Uso de DAO en lugar de Repositories**: Se optó por utilizar DataAccessObjects (DAO) aunque en algunos sitios lo deciden llamar Repositories
- **Separación de Rutas Web y API**: Las rutas se dividieron claramente entre las destinadas a la interfaz de usuario y las destinadas a la API, las del backend relacionadas al API estarán en routes/api.php mientras que las rutas para el frontend serán manejadas por la implementación de react directamente.
- **Estructura de Carpetas Basada en Funcionalidad**: Se organizó la estructura de carpetas en función de la funcionalidad, separando la capa de acceso a datos, lógica de negocio y controladores.
- **Frontend**: Para el frontend se decidió trabajar con React para intentar dar velocidad al desarrollo basado en mi experiencia, además de proporcionar a mi parecer una forma sencilla de implementar el frontend por componentes.
- **Backend**: Se realizará una implementación del backend usando Laravel tal cual lo estipula la prueba haciendo uso de API REST.
- **Seguridad**: Se manejará la seguridad del backend usando JWT. No se usará Sanctum para validar desde las rutas el token; en cada API se validará que el JWT sea válido, pero no se verificará desde las rutas.

## Otros Detalles
- **Laravel Version**: Se trabajó con Laravel vX.X.X.
- **Base de Datos**: Se utilizó SQLite para el desarrollo y pruebas iniciales.

# Proyecto de Plataforma eCommerce

## Descripción
Este proyecto es una plataforma de eCommerce que permite a los usuarios explorar y gestionar productos.

## Tareas a Ejecutar

| Orden | Tarea                                   | Descripción breve                                                                    |
|-------|-----------------------------------------|--------------------------------------------------------------------------------------|
| 1     | Configuración del entorno de desarrollo | Preparar el entorno de desarrollo para frontend y backend                            |
| 2     | Diseño de la interfaz de usuario        | Crear la estructura HTML y estilos CSS para mostrar productos                        |
| 3     | Conexión con el Backend                 | Establecer comunicación entre frontend y backend para obtener datos de productos     |
| 4     | Implementación de CRUD en el Backend    | Crear las operaciones CRUD para la gestión de productos en el backend                |
| 5     | Validación de datos y manejo de errores | Implementar validación de datos y manejo adecuado de errores en el backend           |
| 6     | Integración de base de datos            | Configurar la base de datos y modelos en Laravel para almacenar información          |
| 7     | Funcionalidades adicionales en Frontend | Implementar búsqueda, filtros o autenticación (si es necesario) en el frontend       |
| 8     | Documentación                           | Registrar supuestos, decisiones y detalles relevantes durante el desarrollo          |
| 9     | Crear repositorio y subir código        | Iniciar el repositorio en GitHub y subir el código del proyecto               |
| 10    | Pruebas finales y despliegue            | Realizar pruebas finales antes del despliegue en un entorno de producción            |


## Notas Adicionales
- Se asumió que las rutas y controladores son ejemplos básicos y se expandirán según los requisitos del proyecto.
- La estructura de carpetas y nombres se basa en convenciones comunes en proyectos de desarrollo.
- Se siguió una metodología ágil durante el desarrollo para iterar y ajustar según sea necesario.

El frontend está alojado en un repositorio separado. Sigue estas instrucciones para ejecutarlo:

1. Clona el repositorio del frontend.
2. Navega al directorio del proyecto.
3. Ejecuta `npm install` para instalar las dependencias.
4. Inicia el servidor con `npm start`.
5. Accede al frontend en [http://localhost:3000](http://localhost:3000).
