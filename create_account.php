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
      <form  id="myForm"  class="create-account-form" hx-post="./api.php?action=sign" hx-target=".ssdd" hx-swap="innerhtml" >
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
  <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." required>
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
    <button class="submit-btn" type="submit"  >تسجيل</button>
</div>

    </form>
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>



<script>






var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}














document.getElementById("pass").addEventListener("input", function() {
  // قواعد كلمة المرور
  const minLength = 8;
  const hasUpperCase = /[A-Z]/.test(this.value);
  const hasLowerCase = /[a-z]/.test(this.value);
  const hasNumber = /\d/.test(this.value);

  // التحقق من تحقق المتطلبات
  const isValid =
    this.value.length >= minLength &&
    hasUpperCase &&
    hasLowerCase &&
    hasNumber;

  // إذا لم تكن كلمة المرور صالحة، قم بعرض رسالة الخطأ
  if (!isValid) {
    document.getElementById("accountIDValidationMessage-pass").textContent = "كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل، وعلى الأقل حرف كبير وحرف صغير ورقم.";
  } else {
    document.getElementById("accountIDValidationMessage-pass").textContent = "";
  }
});





/* بداية */
// تحقق من عدد الارقام //

      // للتحقق من ان رقم الهاتف فقط لا يتجاوز 10 ارقام
      document.getElementById("number").addEventListener("input", function() {
        // الحد الأقصى لعدد الأرقام المسموح به
        const maxDigits = 10;

        // قم بالتحقق من عدد الأرقام في الحقل
        const inputValue = this.value.replace(/\D/g, ''); // استخدم \D لإزالة غير الأرقام
        const numberOfDigits = inputValue.length;

        // إذا تجاوز العدد المسموح، قم بقص التفاصيل الإضافية
        if (numberOfDigits > maxDigits) {
          this.value = inputValue.slice(0, maxDigits);
        }
      });

/* نهاية */

/* بداية */
// تحقق من الاسم الاول //
      document.getElementById("FName").addEventListener("input", function() {
        // السماح فقط بالأحرف وعدم السماح بالأرقام أو المسافات
        const inputValue = this.value;
        const isValid = /^[ء-ي]+$/.test(inputValue);

        // إذا لم يكن الإدخال صالحًا، قم بإظهار رسالة الخطأ وقم بإزالة الأحرف غير الصالحة
        if (!isValid) {
          this.value = inputValue.replace(/[^ء-ي]/g, ''); // قم بإزالة أي شيء غير الأحرف العربية
          document.getElementById("accountIDValidationMessage-FName").textContent = "يجب أن يحتوي الاسم الاول على أحرف فقط.";
        } else {
          document.getElementById("accountIDValidationMessage-FName").textContent = "";
        }
      });

/* نهاية */

/* بداية */
// تحقق من الاسم الاخير //
      document.getElementById("LName").addEventListener("input", function() {
        // السماح فقط بالأحرف وعدم السماح بالأرقام أو المسافات
        const inputValue = this.value;
        const isValid = /^[ء-ي]+$/.test(inputValue);

        // إذا لم يكن الإدخال صالحًا، قم بإظهار رسالة الخطأ وقم بإزالة الأحرف غير الصالحة
        if (!isValid) {
          this.value = inputValue.replace(/[^ء-ي]/g, ''); // قم بإزالة أي شيء غير الأحرف العربية
          document.getElementById("accountIDValidationMessage-LName").textContent = "يجب أن يحتوي الاسم الأخير على أحرف فقط.";
        } else {
          document.getElementById("accountIDValidationMessage-LName").textContent = "";
        }
      });

/* نهاية */









</script>






    <?php
                        if (isset($_POST['sign'])) {
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $Account_ID = $_POST['Account_ID'];
                                $First_Name = $_POST['First_Name'];
                                $Last_Name = $_POST['Last_Name'];
                                $Email = $_POST['Email']; 
                                $Mobile = $_POST['Mobile'];
                                $Password = $_POST['Password'];

if (!count($errors)) {
    $Password = password_hash($Password, PASSWORD_DEFAULT);
}

$Position = $_POST['Position'];

$sql = "INSERT INTO accounts (Account_ID, First_Name, Last_Name, Email, Password, Mobile, Position, Admin_ID) VALUES ('$Account_ID', '$First_Name', '$Last_Name', '$Email', '$Password', '$Mobile', '$Position', '1')";
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