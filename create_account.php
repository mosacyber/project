<?php include 'errors/errors.php';  ?>
<!DOCTYPE html>
<html lang="en">

      <!-- مكتبه htmx -->
<script src="https://unpkg.com/htmx.org@1.9.10" ></script>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cheatsheet-rtl/">


    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css_rtl/bootstrap.min.css" />

  <link rel="stylesheet" href="./language.css" />
  <!-- style css File RTL-->
  <link rel="stylesheet" href="assets/css_rtl/style.css" />

  <!-- style css File Ltr-->
  <!-- <link rel="stylesheet" href="css_ltr/style.css" /> -->

  <!-- Title Icon -->
  <link rel="icon" href="assets/img/fav-icon.png" />


 <!--js file  -->


  <title>تسجيل الدخول</title>


  <style>
      .mode-switch {
    width: 20px;
    height: 20px;

    svg {
      width: 16px;
      height: 16px;
    }
  }
  .mode-switch {
  background-color: transparent;
  border: none;
  padding: 0;
  color: var(--main-color);
  display: flex;
  justify-content: center;
  align-items: center;
}.mode-switch.active .moon {
  fill: var(--main-color);
}.dark & {
    color: var(--secondary-color);

    input:checked + label {
      color: var(--star);
    }
  }
  .dark:root {
  --app-container: #1f1d2b;
  --app-container: #111827;
  --main-color: #fff;
  --secondary-color: rgba(255, 255, 255, 0.8);
  --projects-section: #1f2937;
  --link-color: rgba(255, 255, 255, 0.8);
  --link-color-hover: rgba(195, 207, 244, 0.1);
  --link-color-active-bg: rgba(195, 207, 244, 0.2);
  --button-bg: #1f2937;
  --search-area-bg: #1f2937;
  --message-box-hover: #243244;
  --message-box-border: rgba(255, 255, 255, 0.1);
  --star: #ffd92c;
  --light-font: rgba(255, 255, 255, 0.8);
  --more-list-bg: #2f3142;
  --more-list-bg-hover: rgba(195, 207, 244, 0.1);
  --more-list-shadow: rgba(195, 207, 244, 0.1);
  --message-btn: rgba(195, 207, 244, 0.1);
}
.dark & {
  box-shadow: none;
}
:root {
  --app-container: #f3f6fd;
  --main-color: #1f1c2e;
  --secondary-color: #4A4A4A;
  --link-color: #1f1c2e;
  --link-color-hover: #c3cff4;
  --link-color-active: #fff;
  --link-color-active-bg: #1f1c2e;
  --projects-section: #fff;
  --message-box-hover: #fafcff;
  --message-box-border: #e9ebf0;
  --more-list-bg: #fff;
  --more-list-bg-hover:  #f6fbff;
  --more-list-shadow: rgba(209, 209, 209, 0.4);
  --button-bg: #1f1c24;
  --search-area-bg: #fff;
  --star: #1ff1c2e;
  --message-btn: #fff;
}
body {
  background-color: var(--app-container);
  color: var(--main-color);
}
 .form-container{
  background-color: var(--app-container);
  color: var(--main-color);
}





/*  
////////////
*/
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}





  </style>
</head>

<body>
<center>
	<div class="switch">
	    <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
	    <label for="language-toggle"></label>
	    <span class="on">BN</span>
	    <span class="off">EN</span>
  	</div>
 </center>
 <button class="mode-switch" title="Switch Theme">
          <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
            <defs></defs>
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
          </svg>
        </button>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
  var modeSwitch = document.querySelector('.mode-switch');

  modeSwitch.addEventListener('click', function () {                     document.documentElement.classList.toggle('dark');
    modeSwitch.classList.toggle('active');
  });});
        </script>
   <!-- Start Overlay Mobile -->
  <div class="overlay"></div>
  <!-- End Overlay Mobile -->
  <!-- Start Navbar -->

  <!-- End Navbar -->

  <!-- Start Create Account Form -->
  <div class="container">
    <div class="form-container">
  


    <!--
      hx-swap="innerhtml"
      hx-swap="outerhtml"
      hx-swap="beforeend"
      hx-swap="afterend"
      afterbegin
    -->
    <form id="myForm" class="create-account-form" method="POST" action="">
      <h3 align="center">انشاء  حساب جديد</h3>
      
      
      <div class="input-box email ">
      <label>الرقم الجامعي او الوظيفي</label>
      <input name="Account_ID" id="accountID" type="number" class="form-control" placeholder="الرقم الجامعي " />
        <div id="accountIDValidationMessage-accountID"></div>
      </div>

      <div class="input-box email">
      <label>الاسم الاول</label>
        <input name="First_Name" id="FName"  type="text" class="form-control" placeholder="الاسم الاول" />
        <div id="accountIDValidationMessage-FName"></div>
      </div>
      <div class="input-box email">
  <label>الاسم الاخير</label>
  <input name="Last_Name" id="LName" type="text" class="form-control" placeholder="الاسم الاخير" />
  <div id="accountIDValidationMessage-LName"></div>
</div>

      <div class="input-box email">
      <label>البريد الإلكتروني</label>
        <input name="Email" id="email" type="email" class="form-control" placeholder="البريد الإلكتروني" />
        <div id="accountIDValidationMessage-email"></div>
      </div>
      <div class="input-box email">
  <label>كلمة المرور</label>
 <!-- <input name="Password" id="pass" type="password" class="form-control" placeholder="كلمة المرور" /> -->
 <input type="password" id="psw" name="Password"  data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." required>
 <div id="accountIDValidationMessage-pass"></div>
  


      <div class="input-box email">
  <label>رقم الجوال</label>
  <input name="Mobile" id="number" type="text" class="form-control" placeholder="الجوال" />
  <div id="accountIDValidationMessage-number"></div>
</div>

      <div class="input-box email">
      <label>المنصب</label>
        <input name="Position" id="Position" type="text" class="form-control" placeholder="المنصب" />
        <div id="accountIDValidationMessage-Position"></div>
      </div>
     

      <div class="input-box">
      <button class="submit-btn" type="submit" name="sign">تسجيل</button>
</div>

    </form>







    <?php
$errors = []; // تعريف متغير $errors كمصفوفة فارغة

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق من وجود عنصر "Password" في الطلب المرسل
    if (isset($_POST['Password']) && !empty($_POST['Password'])) {
      // استخدام كلمة المرور بشكل آمن هنا
      $password = $_POST['Password'];
  } else {
      // عرض رسالة خطأ إذا لم يتم تقديم كلمة مرور
      echo "كلمة المرور مطلوبة.";
  }
  
}

// التحقق من وجود مصفوفة $errors وعدم فراغها قبل استخدامها
if (!empty($errors)) {
    // إذا كانت $errors غير فارغة، يمكنك عرض رسائل الخطأ هنا
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
}

// التأكد من تعريف المتغير $mysqli
if (!isset($mysqli)) {
    // يمكنك تعريف وتهيئة المتغير $mysqli هنا
    // على سبيل المثال:
    $mysqli = new mysqli("localhost", "root", "", "university_info");

    // التحقق من الاتصال بقاعدة البيانات
    if ($mysqli->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $mysqli->connect_error);
    }
}

// الآن يمكنك استخدام $mysqli بشكل آمن في الشفرة الخاصة بك
?>



    <?php
                        if (isset($_POST['sign'])) {
                          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $Account_ID = $_POST['Account_ID'];
                            $First_Name = $_POST['First_Name'];
                            $Last_Name = $_POST['Last_Name'];
                            $Email = $_POST['Email']; 
                            $Mobile = $_POST['Mobile'];
                            $Password = $_POST['Password']; // تم تغيير هنا

                            if (!empty($Password)) { // تم تغيير هنا
                              $Password = password_hash($Password, PASSWORD_DEFAULT);
                          }
                  
                          $Position = $_POST['Position'];
                  
                          $sql = "INSERT INTO accounts (Account_ID, First_Name, Last_Name, Email, Password, Mobile, Position) VALUES ('$Account_ID', '$First_Name', '$Last_Name', '$Email', '$Password', '$Mobile', '$Position')";
                          if ($mysqli->query($sql) === TRUE) {
                  
                              echo '<p id="success-message" class="date">تمت إضافة التصنيف بنجاح</p>';
                          } else {
                              echo '<p class="date">حدث خطأ في إدخال البيانات: ' . $mysqli->error . '</p>';
                          }
                      }
                  }
                        ?>



   
      </div>
    </div>
 
    <br>
    <a href="login.php" class="create-account-link">تسجيل الدخول</a>
  </div>
  <!-- End Create Account Form -->
  <script src="./assets/js/creat.js"></script>

 
  <!-- javascript file -->
  <script src="js/script.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="cheatsheet.js"></script>
</body>

</html>