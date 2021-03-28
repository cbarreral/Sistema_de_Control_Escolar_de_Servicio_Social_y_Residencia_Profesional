<?php

    //Definir todas la constantes de los parametros de la conexion
    const SERVER="http://localhost/Sistema/";

    const DB="prueba";

    const USER="root";

    const PASS="";

    //Conexion de PDO
    //Constante para enviar los parametros de la conexion de la base de datos
    //Conectarnos a la base de datos
    const SGBD="mysql:host=".SERVER.";dbname=".DB;
    //Constantes para configuracion de encriptacion 

    const METHOD="AES-256-CBC";

    //Definir una llave secreta
    const SECRET_KEY="$RESIDENCIASYSERVICIOSOCIAL@2020";

    //IDENTIFICADOR UNICO
    const SECRET_IV='037970';