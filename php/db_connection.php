<?php
$user = 'root'; // тута нада вписать юзернейм и пароль от базы данных
$password = '';
$dbh = null;
try {
    $dbh = new PDO('mysql:host=localhost;dbname=viar', $user, $password);
    $dbh->exec('SET NAMES utf8');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}