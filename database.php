<?php

function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

function connect()
{
        $dsn = 'mysql:host=localhost;dbname=board;charset=utf8mb4;';
        $username = 'root';
        $password = '';


    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = null;

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        echo '<p>'.$e->getMessage().'</p>';
    }

    return $pdo;
}