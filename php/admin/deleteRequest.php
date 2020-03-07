<?php
function deleteRequest(){
    require_once '../db_connection.php';
    $errors =[];
    $result = [];
    if (isset($_POST['id']))
    {
        $id = intval($_POST['id']);
        $data = [
            'id' => $id,

        ];
        try{
            $sql = "DELETE FROM requests WHERE id=:id";
            $stmt= $dbh->prepare($sql);
            $stmt->execute($data);
        }catch (Exception $exception)
        {
            $errors['system'] = 'Error! ' . $exception->getMessage();
        }
        if (empty($errors))
        {
            $result['status'] = 'ok';
            $result['message'] = $id;
        }else{
            $result['status'] ='error';
            $result['message'] = $errors;
        }
        echo json_encode($result);
    }
}
deleteRequest();
