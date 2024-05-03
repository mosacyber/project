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
  <link rel="stylesheet" href="../assets/css_rtl/style.css" />
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<div class="container-fluid">
<div class="col-12 col-lg-12">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-6 col-lg-6">
        <div class="card">
          <div class="card-body">  

            <h2 class="text-center mb-4">طلب استعاده كلمه المرور</h2>
            <form action="" method="POST">
                <div class="form-floating">
                <input name="Account_num" type="number" min="0" id="Account_ID"  required autofocus class="form-control" placeholder="الرقم الجامعي " />
                <label for="الرقم الجامعي"> ادخل رقمك الجامعي</label>
                </div>
                <br>
                <br>
                <?php include '../errors/errors.php';  ?>
                <div align="center">
                <button type="submit"  name="recover" class="btn btn-primary btn-block llcol">ارسال رمز استعادة كلمة المرور </button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-6">
  <div class="card">
    <div class="card-body2" >
      <img class='col-12 photo img-fluid' src="../assets/img/uu.png" alt="">
      <img class='col-12 photo img-fluid' src="../assets/img/fdfd1.png" alt="">
      <img class='col-12 photo img-fluid' src="../assets/img/uu.png" alt="">
      <img class='col-12 photo img-fluid' src="../assets/img/fdfd1.png" alt="">
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
  </div>
  </div>
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
if (isset($_POST["recover"])) {
    include ('connect/connection.php');
    $Account_ID = $_POST["Account_num"];

    $sql = mysqli_query($connect, "SELECT `First_Name`, `Last_Name`, `Email`, `Status_ID` FROM `accounts` WHERE `Account_ID`='$Account_ID'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if ($query == 0) {
        ?>
        <script>
            alert("عذراً لايوجد حساب بالرقم المدخل!");
        </script>
        <?php
    } else if ($fetch["status"] == 0) {
        ?>
            <script>
                alert("عذراً، لايمكنك تغيير كلمة السر، يجب عليك تفعيل حسابك أولاً!");
                window.location.replace("../index.php");
            </script>
        <?php
    } else {
        $email = $fetch["Email"];
        $firstName = $fetch["First_Name"];

        // Generate OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = ''; 
        $mail->Password = '';

        $mail->setFrom('', 'فريق الدعم الخاص بمنصة الجامعة الألكترونية');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "رمز إعادة تعيين كلمة السر.";
        $mail->Body = "<p>مرحبا $firstName,</p><h3>رمز التحقق الخاص بإعادة تعيين كلمة السر لحسابك هو:  $otp</h3><br><br><p></p><b>خالص تحياتنا فريق الدعم 🙌</b>";

        if (!$mail->send()) {
            ?>
                <script>
                    alert("حدث خطأ، البريد الإلكتروني غير صالح.");
                </script>
            <?php
        } else {
            ?>
                <script>
                    window.location.replace("verification_For_pass.php");
                    alert("تم إرسال رمز التحقق إلى بريدك الإلكتروني.");
                </script>
            <?php
        }
    }
}
?>