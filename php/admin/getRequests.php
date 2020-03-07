<?php



    require_once 'php/db_connection.php';
    $errors = [];
    $result = '';
    if ($dbh) {
        try{
            $isAnyData = false;
            $stmt = $dbh->prepare("SELECT * FROM requests ORDER BY id DESC");
            $stmt->execute();

            while( $requests = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $isAnyData = true;
                foreach ($requests as $request) {
                    if ($request['status'] == 'pending')
                    {
                        $class = '--new';
                        $readButton = "<button class=\"table__mark-button updateStatus\" data-id=\"".$request['id']."\">Read</button>";
                    }else{
                        $readButton = '';
                        $class ='';
                    }
                    $result .= "<div class=\"table__block table__block$class\">
						<p class=\"table__id\">".$request['id']."</p>
						<p class=\"table__name\">".$request['name']."</p>
						<p class=\"table__phone\">".$request['phone']."</p>
						<p class=\"table__option\">".$request['requested_choice']."</p>	
						<div class=\"table__buttons-wrap\">
							$readButton
							<button class=\"table__delete-button deleteRequest\" data-id=\"".$request['id']."\">Delete</button>
						</div>
					</div>";
                }
            }
            if (count($requests)==0  && !$isAnyData)
            {

                $result = "<div style='color:blue'>Нет запросов...</div>";
            }
        }catch (Exception $exception)
        {
            echo 'Ошибка! ' . $exception->getMessage();
        }
    }


