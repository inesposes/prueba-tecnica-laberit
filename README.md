# Prueba técnica Laberit

## Instalación y requisitos

Sistema Operativo:
- Linux
- Windows: necesaria una máquina virtual, WSL o entorno que permita trabajar con Docker.

Docker instalado

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


## Detalles