<?php
if (isset($_POST['logoff']))
{
    session_start();
    unset($_SESSION['loggedIN']);
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
    header("Location: ".$protocol . $_SERVER['HTTP_HOST']);
}