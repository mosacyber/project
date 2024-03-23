<?php
session_start();
if(isset($_SESSION['logged_in'])) {
$_SESSION = [];
header('location: /project/login.php');
die();
}else{

    header('location: /project/login.php');

}