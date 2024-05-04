<?php

$db['DB_HOST'] = "localhost";
$db['DB_USER'] = "root";
$db['DB_PASS'] = "";
$db['DB_NAME'] = "university_info";

$servername = "localhost";
$username = "root";
$password = "";


try {
  $conn = new PDO("mysql:host=$servername;dbname=university_info", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


foreach($db as $key => $value){
  if (!defined(strtoupper($key))) {
      define(strtoupper($key), $value);
  }
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$conn = new mysqli($servername, $username, $password);

$conn = @mysqli_connect("localhost", "root", "", "university_info")
    or die(mysqli_connect_error());
    ?>
