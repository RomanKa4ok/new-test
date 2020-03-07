<?php
(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && header("HTTP/1.0 403 Not allowed");;
if (PHP_SAPI === 'cli' && !isset($_SERVER['HTTP_USER_AGENT'])) {
    require_once 'db_connection.php';
    $username = 'viarwork'; // тута логин и пароль для админа, когда поменяешь логин и пароль, запусти эту команду/ понял?+
    $password = password_hash('viarwork', PASSWORD_DEFAULT);
    $data = [
        'username' => $username,
        'password' => $password
    ];
    try {
        $sql = "INSERT INTO admins (username, password) VALUES (:username, :password)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

    } catch (Exception $exception) {
        echo $exception->getMessage();
        echo 'Ошибка выполнения запроса!';
    }
}