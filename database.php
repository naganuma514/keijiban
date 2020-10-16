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

function insertText($pdo,$a,$b) {
    $stmt = $pdo->prepare('INSERT INTO `message` (`id`, `view_name`, `message`, `post_date`) VALUES (null, ?, ?, ?)');
        
        $now_date = date("Y-m-d H:i:s");

        $params = [0 => $a, 1 => $b, 2 =>$now_date];
            
        $success = $stmt->execute($params);
            
        if ($success) {
            echo 'メッセージを書き込みました。';
        } 
} 