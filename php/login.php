<?php
function doLogin()
{
    require_once 'db_connection.php';
    $errors = [];
    $result = [];
    if (isset($_POST['username']) && strlen(trim($_POST['username'])) && isset($_POST['password']) && strlen(trim($_POST['password']))) {
        try{
            $stmt = $dbh->prepare("SELECT username, password FROM admins where username=:username LIMIT 1");
            $stmt->execute(['username'=>$_POST['username']]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (Exception $exception)
        {
            echo json_encode($exception->getMessage());
        }

        if ($admin)
        {
            if (password_verify($_POST['password'], $admin['password']))
            {
                session_start();
                $_SESSION['loggedIN'] = ['loggedIn'=>true,'name'=>$admin['username']];
            }else{
                $errors['password'] = 'Неправильный пароль!';
            }
        }else{
            $errors['username'] = 'Не найден пользователь с такими данными!';
        }
    }else{
        if (!isset($_POST['username']) || !strlen(trim($_POST['username'])))
        {
            $errors['username'] = 'Поле обязательно!';
        }
        if (!isset($_POST['password']) || !strlen(trim($_POST['password'])))
        {
            $errors['password'] = 'Поле обязательно!';
        }
    }
    if (empty($errors))
    {
        $result['status'] = 'ok';
        $result['message'] = 'Вы вошли';
    }else{
        $result['status'] = 'error';
        $result['message'] = $errors;
    }
    echo json_encode($result);
}
doLogin();