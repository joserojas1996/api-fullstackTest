# Api Rest Sales system

Api Rest para la gestion de ventas. Administra proveedores, clientes, usuarios, filiales, comunas, ciudades, monedas.

# Instalación

[(Ir a inicio)](#table-of-contents)

1. Instalar PHP (Preferiblemente, version = 7.4.*)
2. Instalar Laravel (Preferiblemente, version = 5.8.*)
3. Descargar el proyecto [Api Rest Sales System](https://github.com/joserojas1996/api-fullstackTest.git).
4. Ingresar a la carpeta del proyecto

    ```sh
    cd api-fullstackTest
    ```
5. Instalar las dependencias de laravel `composer install`

    *Nota: debe tener `composer` instalado en su sistema*

    ```sh
    composer install
    ```

6. Agregar su archivo de configuración `.env`

    *Nota: Si utiliza un sistema operativo `Debian` o sus derivados ejecutar:*
     ```sh
    cp .env.example .env
    ```

7. Agrregar su configuracion de base de datos `.env`

     ```sh
    DB_CONNECTION=mysql //tipo de base de dato
    DB_HOST=127.0.0.1 //Dirección
    DB_PORT=3306 // Puerto
    DB_DATABASE=laravel // Nombre de la base de datos
    DB_USERNAME=root // usuario Mysql
    DB_PASSWORD= // Clave de usuario mysql si posee
    ```
8. Generar `API_KEY`

     ```sh
    php artisan key:generate
    ```

9. Ejecutar migraciones de laravel junto con sus seeder

     ```sh
    php artisan migrate:fresh --seed
    ```

10. iniciar servidor de desarrollo

     ```sh
    php artisan serve
    ```
11. iniciar servidor de desarrollo

     ```sh
        php artisan serve
    ```
12. Ahora debe ingresar en [(http://localhost:8000))](http://localhost:8000) 

13. Para ver la colección de endpoinds y ejemplos de su funcionaliento puede ingresar a la collección de Postman

    Link de colección Postman
    https://www.postman.com/rojas-developer/workspace/laraveltest/collection/12180152-d4367e70-75f2-4f89-95df-c30e043d8916?action=share&creator=12180152&ctx=documentation
