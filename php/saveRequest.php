<?php
function saveRequest(){
    require_once 'db_connection.php';
    $errors = [];
    $result = [];
    if ($dbh)
    {
        if (isset($_POST['name'])&& strlen(trim($_POST['name'])) && isset($_POST['phone']) && strlen(trim($_POST['phone'])) && isset($_POST['service']) && strlen(trim($_POST['service']))) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $requested_choice = $_POST['service'];

            $data = [
                'name' => $name,
                'phone' => $phone,
                'requested_choice' => $requested_choice,
            ];
            try{
                $sql = "INSERT INTO requests (name, phone, requested_choice) VALUES (:name, :phone, :requested_choice)";
                $stmt = $dbh->prepare($sql);
                $stmt->execute($data);
            }catch (Exception $exception)
            {
                $errors['system'] = 'Ошибка выполнения запроса!';
            }

        }else{
            if (!isset($_POST['name']) || !strlen(trim($_POST['name']))){
                $errors['name'] = 'Поле обязательно!';
            }
            if (!isset($_POST['phone']) || !strlen(trim($_POST['phone']))){
                $errors['phone'] = 'Поле обязательно!';
            }
            if (!isset($_POST['service']) || !strlen(trim($_POST['service']))){
                $errors['service'] = 'Поле обязательно!';
            }

        }
        if (empty($errors))
        {
            $result['status'] = 'ok';
            $result['message'] = 'Ваша заявка принята! Ожидайте звонка!';
        }else{
            $result['status'] = 'error';
            $result['message'] = $errors;
        }
        echo json_encode($result);
    }
}
saveRequest();