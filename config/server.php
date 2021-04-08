<?php

    //Definir todas la constantes de los parametros de la conexion
    const  SERVER="http://localhost/Sistema/";

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
    const SECRET_KEY="$RESIDENCIASYSERVICIOSOCIAL@2021";

    //IDENTIFICADOR UNICO
    const SECRET_IV='037970';

    //Habilitar correo para envio de notificaciones por gmail
    //paso 1 https://accounts.google.com/b/0/DisplayUnlockCaptcha
    //paso 2 https://myaccount.google.com/u/1/lesssecureapps?utm_source=google-account&utm_medium=web&pli=1&rapt=AEjHL4OTRrZJMzlSZflvysBiCdFn1A0c7LBZmgvxF6BdQo74TPGJ_ZqEZ_6S7WKzx3sVlrFktgVJ20JyYxDhm8YGtQB97MOI5A
