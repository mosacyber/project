<?php
session_start();
if(isset($_SESSION['logged_in'])) {
$_SESSION = [];
header('location: /project/index.php');
die();
}else{

    header('location: /project/index.php');

}