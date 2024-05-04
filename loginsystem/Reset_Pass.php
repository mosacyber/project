<?PHP session_start(); ?>
<?php include '../db/db.php';  ?>

<?php include '../config/app.php';  ?>



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
  <link href="../assets/css/navbar.css" rel="stylesheet">



 <link href="../assets/css/navbar.css" rel="stylesheet"> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="stylesheet" href="../assets/css/index.css" />
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
        <a href="../index.php"><button type="submit"  class="btn btn-primary llcol">تسجيل الدخول</button></a> 
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

            <h2 class="text-center mb-4">انشاء كلمة سر جديدة</h2>
            <form action="" method="POST">
                <label for="password" class="text-center mb-4">أدخل كلمة السر الجديدة</label>
                <div class="form-floating">
                <input type="password" id="password" class="form-control" name="password" required autofocus>
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <label for="password" class="text-center mb-4">تأكيد كلمة السر</label>
                <div class="form-floating">
                <input type="password" id="confirm_password" class="form-control" name="confirm_password" required autofocus>
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <br>


                

                
                <br>
                <?php include '../errors/errors.php';  ?>
                <div align="center">
                <input type="submit" value="Reset" name="reset" class="btn btn-primary btn-block llcol">
                </div>
            </form>


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
  <script src="../assets/js/js/bootstrap.bundle.min.js"></script>

  <!-- javascript file -->
  <script src="../assets/js/js/script.js"></script>











  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map (popoverTriggerEl=> new bootstrap.Popover (popoverTriggerEl))
</script>
</body>
</html>

<?php
include('connect/connection.php');

if (isset($_POST["reset"])) {
    $psw = $_POST["password"];
    $confirm_password = $_POST['confirm_password'];
    $Email = $_SESSION['email'];

    if ($psw !== $confirm_password) {
        echo "<script>alert('كلمتا المرور غير متطابقتين.');</script>";
    } else {
        $hash = password_hash($psw, PASSWORD_DEFAULT);
        $stmt = $connect->prepare("UPDATE accounts SET Password = ? WHERE Email = ?");
        $stmt->bind_param("ss", $hash, $Email);
        if ($stmt->execute() && $stmt->affected_rows > 0) {
            echo "<script>alert('تم تغيير كلمة المرور بنجاح'); window.location.replace('../index.php');</script>";
        } else {
            echo "<script>alert('حاول مرة أخرى'); window.location.reload();</script>"; // تحديث الصفحة لإعادة المحاولة
        }
    }
}
?>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('bi-eye');
    });
</script>
