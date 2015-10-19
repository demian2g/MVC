<?php

    include file_exists('config/main.local.php') ? 'config/main.local.php' : 'config/main.php';

    try {

        $dbConnection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbConnection->exec("set names utf8");

    } catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }