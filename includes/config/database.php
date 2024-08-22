<?php

function conectarDB() : mysqli {
    $db = new mysqli(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS'], 
        $_ENV['DB_NAME'], 
    );

    $db->set_charset('UTF8');

    if(!$db) {
        echo "Error, no hay conexion con la base de datos";
        exit;
    }

    return $db;
}