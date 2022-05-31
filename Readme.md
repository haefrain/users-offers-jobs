# Talentu Test

Esta prueba fue realizada con el framework Laravel v8.6

## Prerequisitos

Se debe contar con Docker, todo el proyecto (incluida base de datos) esta dockerizada.

## Instalacion

En la raiz del proyecto, ejecutar el siguiente comando
```bash
docker-compose up -d
```
En caso de necesitar permisos no olvidar ante poner el
```
sudo
```

Una vez finalice la descarga de las imagenes y la puesta en marcha se debe correr el siguiente comando
```
docker-compose exec php php /var/www/html/artisan migrate --seed
```
Esto lo que hara sera ejecutar las migraciones sobre la base de datos y posterior ejecutara los seeders y factories para cargar un aproximado de 10.000 registros en el sistema, puede tomar unos minutos.

Ya posterior a todo lo realizado el sistema esta listo para ser utilizado.

Con este comando podremos ejecutar las pruebas E2E
```
docker-compose exec php php /var/www/html/artisan test --testsuite=Feature
```

Cuando ya se quiera dejar de ejecutar las imagenes simplemente ejecutaremos en consola

```
docker-compose down
```

Tener en cuenta que en ciertos sistemas operativos se requieren permisos superiores para ejecutar los comandos anteriores, en sistemas linux no olvidar anteponer el
```
sudo
```

Hecho por:
Efrain Camilo Hernandez Arias