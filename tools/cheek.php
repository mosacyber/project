<?php








echo
"
$currentPage2 = $_SERVER[SCRIPT_FILENAME];

if(strpos($currentPage2, '/student/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '1' ){

    header('location: '.$config[Actors].'student/');
  
  }
}else if(strpos($currentPage2, '/Dean_of_the_College/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '2' ){

    header('location: Dean_of_the_College.php');
  
  }
}else if(strpos($currentPage2, '/Program_Coordinator/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '3' ){

    header('location: Program_Coordinator.php');
  
  }
}else if(strpos($currentPage2, '/Academic_Advisor/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '4' ){

    header('location: Academic_Advisor.php');
  
  }
}else if(strpos($currentPage2, '/Faculty_Member/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '8' ){

    header('location: Faculty_Member.php');
  
  }
}else if(strpos($currentPage2, '/Vice_President_for_Academic_Affairs/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '6' ){

    header('location: Vice_President_for_Academic_Affairs.php');
  
  }
}else if(strpos($currentPage2, '/President_of_the_University/') !== false){
  if (!isset($_SESSION[role]) || $_SESSION[role] == '7' ){

    header('location: President_of_the_University.php');
  
  }
}else {

    header('location: login.php');
  
  
}

";






?>