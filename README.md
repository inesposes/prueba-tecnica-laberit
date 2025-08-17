# Prueba técnica Laberit

Este proyecto es una pequeña aplicación para la gestión de equipos deportivos y sus respectivos jugadores. Ha sido realizada siguiendo el modelo MVC con PHP.

## Requisitos

- Docker y Docker Compose
- Git

## Instalación

Pasos a seguir:

1. Clona el repositorio
```
    git clone https://github.com/inesposes/prueba-tecnica-laberit.git
```

2.  Levanta los servicios docker

```
    cd prueba-tecnica-laberit/
    docker-compose up -d --build
```

3. Inserta datos de prueba

```
docker exec -i database mysql -u user -ppass sports_database < app/db/db_script.sql
```

4. Accede a [localhost:8080](localhost:8080)

¡Ya puedes probar la aplicación!


## Notas técnicas
- El número de jugador y el nombre de equipo han de ser campos únicos en cada tabla
- Se ha creado un modelo para ciudad (City) y deporte Sport. Por ahora cuentan solo con el método getAll(), pero se ha realizado con la idea de que la aplicación pudiese escalar en algún momento y fuese necesario hacer un CRUD de alguna de estas entidades.
- El capitán de un equipo se añade creando/editando. Si ya había uno previo lo sobrescribe.

## Mejoras
- Añadir validaciones de integridad referencial (por ejemplo, comprobar que el id del equipo introducido en el select realmente exista).
