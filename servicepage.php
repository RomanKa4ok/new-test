<?php session_start();
if (isset($_SESSION['loggedIN']) && $_SESSION['loggedIN']['loggedIn'] === true){?>
<?php require_once 'php/admin/getRequests.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Starter">
	<meta name="author" content="Admin">
	<title>VIAR WORK LOGIN</title>

	<link rel="icon" href="images/favicon.png">

	<link rel="stylesheet" href="css/libs/bootstrap-grid.min.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
	<!-- <link rel="stylesheet" href="css/libs/slick.css"/> -->
	<!-- <link rel="stylesheet" href="css/libs/slick-theme.css"/> -->
	<link rel="stylesheet" href="css/styles.min.css">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
	
	

	<main class="content">
		<section class="table">
			<div class="one-container">
				<div class="table__logo"><a href="/" class="table__logo-link"><img src="images/logo.png" alt="logo" class="table__logo-img"></a></div>
				<div class="table__title-wrap">
					<div class="table__user">admin: <?php echo $_SESSION['loggedIN']['name']?></div>
					<h1 class="table__title">заявки</h1>
                    <form action="php/admin/logoff.php" method="post">
                        <button class="table__exit" name="logoff" type="submit">Вийти</button>
                    </form>
				</div>
				<div class="table__container">

					<?php echo $result;?>
					
					
				</div>	
			</div>
		</section>
			
		
	</main>
	
	
	<!-- Scripts -->
	<script src="js/libs/jquery-3.4.1.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
		<script src="js/main.js"></script>
        <script src="js/admin/tasks.js"></script>
		<!-- 	<script type="text/javascript" src="js/libs/slick.min.js"></script> -->
	</body>
	</html>
<?php }else{header("HTTP/1.0 403 Not allowed");
    } ?>