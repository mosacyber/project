<?PHP session_start(); ?>
<?php include 'db/db.php';  ?>

<?php include './config/app.php';  


if (isset($_SESSION['role']) && $_SESSION['role'] == '1'){
  header('location: Actors/student');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
  header('location: admin');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == '2'){
  header('location: Actors/Dean_of_the_College');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == '3'){
  header('location: Actors/Program_Coordinator');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == '4'){
  header('location: Actors/Academic_Advisor');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == '8'){
  header('location: Actors/Faculty_Member');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == '6'){
  header('location: Actors/Vice_President_for_Academic_Affairs');
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == '7'){
  header('location: Actors/President_of_the_University');
}else {

}

























$connection = [
  'host' => 'localhost',
  'user' => 'root',
  'Password' => '',
  'database' => 'university_info'
  ];
  $mysqli = new mysqli(
  $connection ['host'],
  $connection ['user'],
  $connection ['Password'],
  $connection ['database']
  );
  if ($mysqli->connect_error){
  
    die("Error connecting to database" . $mysqli->connect_error);
  } 
  

  /* if(isset($_SESSION['logged_in'])) {
    header('location: index.php');
  }*/

$errors=[];
/*  عشان اذا حدث الصفحه الاولى تبقا بيانات  */
$Account_ID = '';
                            /*  هنا يقوم بفلتره المدخل حتى لو في ثغره يقوم بفلترتها  */
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                              $Account_ID = mysqli_real_escape_string($mysqli, $_POST['Account_ID']);
                              $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
                          
                              if (empty($Account_ID)) {
                                  array_push($errors, "الرقم الجامعي  ");
                              }
                              if (empty($Password)) {
                                  array_push($errors, "كلمة المرور مطلوبة");
                              }
                          
                              // التحقق من عدم وجود أخطاء قبل استعلام قاعدة البيانات
                              if (!count($errors)) {
                                  $userExists = $mysqli->query("SELECT * FROM accounts WHERE Account_ID='$Account_ID' LIMIT 1");
                          
                                  if (!$userExists) {
                                      die("حدث خطأ أثناء تنفيذ الاستعلام: " . $mysqli->error);
                                  }
                          
                                  if ($userExists->num_rows) {
                                    $foundUser = $userExists->fetch_assoc();
                                    if (password_verify($Password, $foundUser['Password'])) {
                                      $_SESSION['logged_in'] = true;
                                      $_SESSION['Account_ID'] = $foundUser['Account_ID']; // تم تصحيح اسم العمود
                                      $_SESSION['First_Name'] = $foundUser['First_Name'];
                                      $_SESSION['Last_Name'] = $foundUser['Last_Name'];
                                      $_SESSION['role'] = $foundUser['Position'];
                                  
                                      if ($foundUser['Position'] == '1' /*student*/ ) {
                                          header('location: Actors/student/');
                                      }elseif($foundUser['Position'] == 'admin'  /**/){
                                        header('location: admin');
                                      }elseif($foundUser['Position'] == '2' /*Dean_of_the_College*/){
                                        header('location: Actors/Dean_of_the_College/');
                                      }elseif($foundUser['Position'] == '3' /*Program_Coordinator*/){
                                        header('location: Actors/Program_Coordinator/');
                                      }elseif($foundUser['Position'] == '4' /*Academic_Advisor*/){
                                        header('location: Actors/Academic_Advisor/');
                                      }elseif($foundUser['Position'] == '8' /*Faculty_Member*/){
                                        header('location: Actors/Faculty_Member/');
                                      }elseif($foundUser['Position'] == '7' /*President_of_the_University*/){
                                        header('location: Actors/President_of_the_University/');
                                      }elseif($foundUser['Position'] == '6' /*Vice_President_for_Academic_Affairs*/){
                                        header('location: Actors/Vice_President_for_Academic_Affairs/');
                                      }else {
                                          header('location: index.php');
                                      }
                                  }
                                   else {
                                        array_push($errors, "الرقم الجامعي أو كلمة المرور غير صحيحة");

                                      }
                                  } else {
                                      array_push($errors, "رقمك الجامعي, $Account_ID غير مسجل في قاعدة البيانات.");
                                  }
                              }
                          }


?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets/css_rtl/bootstrap.min.css" />

  <!-- style css File RTL-->
  <link rel="stylesheet" href="../assets/css_rtl/style.css" />

  <!-- style css File Ltr-->
  <!-- <link rel="stylesheet" href="css_ltr/style.css" /> -->

  <!-- Title Icon -->
  <link rel="icon" href="../assets/img/fav-icon.png" />

  <title>تسجيل الدخول</title>
  <link href="navbar.css" rel="stylesheet">



 <link href="navbar.css" rel="stylesheet"> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="stylesheet" href="login.css" />
    <style>
body > div.container-fluid > div > div:nth-child(1) > div > div > form > div:nth-child(5) > button{
    background: linear-gradient(264.67deg,#7f7fd5 -9.26%,#86a8e7 45.82%,#91eae4 106.96%);
    font-size: large;
    border: 0px;
}







.navbar {
    margin-bottom: 20px;
    box-shadow: 0 4px 14px rgb(0 0 0 / 42%);
}


 



.llcol{
  background: linear-gradient(264.67deg,#7f7fd5 -9.26%,#86a8e7 45.82%,#91eae4 106.96%);

border: 0px solid #fff;
}

  </style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تجريبي</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body> 


<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">تجريبي</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample09">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">الروابط</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">مغلق</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">اكثر</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown09">
            <li><a class="dropdown-item" href="#">واحد</a></li>
            <li><a class="dropdown-item" href="#">اثنين</a></li>
            <li><a class="dropdown-item" href="#">ثلاث</a></li>
          </ul>
        </li>
      </ul>        <form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
        <a href="login.php"><button type="submit"  class="btn btn-primary llcol">تسجيل الدخول</button></a> 
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



 <!--
  container كامل الصفحه مع هوامش 
 container-fluid بدون هوامش 
 -->






 <div class="container-fluid">




<div class="col-12 col-lg-12">






    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-6 col-lg-6">
        <div class="card">
          <div class="card-body">  

            <h2 class="text-center mb-4">تسجيل الدخول</h2>
            <form action="" method="POST">
                <div class="form-floating">
                <input name="Account_ID" type="number" class="form-control" placeholder="الرقم الجامعي " />
                <label for="الرقم الجامعي">الرقم الجامعي</label>
                </div>
                <br>
                <div class="form-floating">
                <input name="Password" type="Password" class="form-control" placeholder="كلمة المرور"  data-bs-toggle="popover" data-bs-title="dffffffff" data-bs-content="fdddddd"/>
                <label for="كلمة المرور">كلمة المرور</label>
                <span class="show-Password"></span>
                </div>
                <br>
                <?php include './errors/errors.php';  ?>
                <div align="center">
                <button type="submit" class="btn btn-primary btn-block llcol">تسجيل الدخول</button>
                </div>
            </form>


          </div>
        </div>
      </div>
      <div class="col-6 col-lg-6">
  <div class="card">
    <div class="card-body2" >
      <img class='col-12 photo img-fluid' src="img/uu.png" alt="">
      <img class='col-12 photo img-fluid' src="img/fdfd1.png" alt="">
      <img class='col-12 photo img-fluid' src="img/uu.png" alt="">
      <img class='col-12 photo img-fluid' src="img/fdfd1.png" alt="">
      <img class='col-12 photo img-fluid' src="https://shaguf.com/site/assets/img/stars.gif" alt="">


    </div>
  </div>
</div>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




   <!-- Start Overlay Mobile -->
  <div class="overlay"></div>
  <!-- End Overlay Mobile -->
  <!-- Start Navbar -->

  <!-- End Navbar -->

  <!-- Start Create Account Form -->

  </div>







  </div>
  <!-- End Create Account Form -->

  <!--Bootstrap  -->
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- javascript file -->
  <script src="js/script.js"></script>











  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map (popoverTriggerEl=> new bootstrap.Popover (popoverTriggerEl))
</script>












</body>

</html>

