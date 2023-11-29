# Proyecto eCommerce - Documentación

## Descripción
Este proyecto se enfoca en desarrollar un módulo básico para una plataforma de eCommerce, incluyendo tanto el frontend como el backend para permitir a los usuarios explorar productos.

## Estructura de Carpetas
- `app/`
  - `DataAccess/`: Contiene las clases para acceso a la base de datos.
  - `Services/` o `Handlers/`: Aquí se encuentran las clases para la lógica de negocio.
  - `Http/Controllers/`: Controladores para manejar solicitudes HTTP.

- `routes/`
  - `web.php`: Definición de rutas para la interfaz de usuario.
  - `api.php`: Rutas destinadas a ser consumidas por una API.

## Supuestos y Decisiones Importantes
Durante el desarrollo, se tomaron en cuenta varios supuestos y decisiones cruciales:
- **Uso de DAO en lugar de Repositories**: Se optó por utilizar DataAccessObjects (DAO) aunque en algunos sitios lo deciden llamar Repositories
- **Separación de Rutas Web y API**: Las rutas se dividieron claramente entre las destinadas a la interfaz de usuario y las destinadas a la API, las del backend relacionadas al API estaran en routes/api.php mientras que las rutas para el frontend seran manejadas por la implementacion de react directamente
- **Estructura de Carpetas Basada en Funcionalidad**: Se organizó la estructura de carpetas en función de la funcionalidad, separando la capa de acceso a datos, lógica de negocio y controladores.
- **Frontend**: Para el frontend se decidio trabajar con react para intentar dar velocidad al desarrollo basado en mi experiencia, ademas de proporcionar a mi parecer una forma sencilla de implementar el frontend por componentes

## Otros Detalles
- **Laravel Version**: Se trabajó con Laravel vX.X.X.
- **Base de Datos**: Se utilizó SQLite para el desarrollo y pruebas iniciales.

## Notas Adicionales
- Se asumió que las rutas y controladores son ejemplos básicos y se expandirán según los requisitos del proyecto.
- La estructura de carpetas y nombres se basa en convenciones preferidas por el equipo de desarrollo.
- Se siguió una metodología ágil durante el desarrollo para iterar y ajustar según sea necesario.
