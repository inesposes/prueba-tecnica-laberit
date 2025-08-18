# Prueba técnica Laberit

Este proyecto es una pequeña aplicación para la gestión de equipos deportivos y sus respectivos jugadores. Ha sido realizada siguiendo el modelo MVC con PHP.

Permite crear equipos, añadir jugadores, asignar capitanes y consultar la información almacenada en la base de datos. 
## 🚀 Requisitos

Comprueba tener instalado en tu máquina:

- Docker
- Docker Compose
- Git

## 🛠️ Instalación

Pasos a seguir:

1. Clona el repositorio
```
    git clone https://github.com/inesposes/prueba-tecnica-laberit.git
```

2. Crea un archivo .env con las variables de entorno que hay en .env.example

> Si eres un técnico/a de selección, he proporcionado por correo electrónico los valores del .env que usé yo para el desarrollo.

3.  Levanta los servicios docker

```
    cd prueba-tecnica-laberit/
    docker-compose up -d --build
```

4. Inserta datos de prueba

```
docker exec -i database mysql -u user -ppass sports_database < app/db/db_script.sql
```

5. Accede a [localhost:8080](localhost:8080)

¡Ya puedes probar la aplicación!


## 📌 Notas técnicas
-Restricciones de unicidad:
    - El número de jugador debe ser único en la tabla de jugadores.
    - El nombre del equipo debe ser único en la tabla de equipos.

- Modelos incluidos a mayores:
    - City y Sport cuentan de momento únicamente con el método getAll().
    - Están preparados para escalar, por si en el futuro fuese necesario un CRUD completo.

- Gestión de capitanes:
    - El capitán de un equipo se define al crear/editar un jugador.
    - Si ya existía un capitán en el equipo, este se sobrescribe.

- Datos iniciales:
    - Se crean 8 equipos de ejemplo.
    - Solo el equipo BM_Sa contiene jugadores y capitán inicial, para poder comenzar a interactuar.

## 💡 Posibles mejoras
- Añadir validaciones de integridad referencial (por ejemplo, comprobar que el id del equipo introducido en el select realmente exista).
- Añadir tests automatizados.
- Crear CRUD completo para City y Sport.
- Mejorar la interfaz de usuario para facilitar la navegación.