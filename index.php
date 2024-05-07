<?PHP session_start(); ?>
<?php include 'db/db.php'; ?>
<?php include './config/app.php';

if (isset($_SESSION['role']) && $_SESSION['role'] == '1') {
  header('location: Actors/student');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
  header('location: admin');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == '2') {
  header('location: Actors/Dean_of_the_College');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == '3') {
  header('location: Actors/Program_Coordinator');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == '4') {
  header('location: Actors/Academic_Advisor');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == '8') {
  header('location: Actors/Faculty_Member');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == '6') {
  header('location: Actors/Vice_President_for_Academic_Affairs');
} else if (isset($_SESSION['role']) && $_SESSION['role'] == '7') {
  header('location: Actors/President_of_the_University');
} else {

}

$connection = [
  'host' => 'localhost',
  'user' => 'root',
  'Password' => '',
  'database' => 'university_info'
];
$mysqli = new mysqli(
  $connection['host'],
  $connection['user'],
  $connection['Password'],
  $connection['database']
);
if ($mysqli->connect_error) {

  die("Error connecting to database" . $mysqli->connect_error);
}

$errors = [];
$Account_ID = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Account_ID = mysqli_real_escape_string($mysqli, $_POST['Account_ID']);
    $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);

    if (empty($Account_ID)) {
        array_push($errors, "الرقم الجامعي مطلوب");
    }
    if (empty($Password)) {
        array_push($errors, "كلمة المرور مطلوبة");
    }

    if (!count($errors)) {
        $query = "SELECT * FROM accounts WHERE Account_ID = '$Account_ID' LIMIT 1";
        $userExists = $mysqli->query($query);

        if (!$userExists) {
            die("حدث خطأ أثناء تنفيذ الاستعلام: " . $mysqli->error);
        }

        if ($userExists->num_rows) {
            $foundUser = $userExists->fetch_assoc();
            // التحقق من حالة الحساب
            if ($foundUser['Status_ID'] == '0') {
              $_SESSION['alert'] = "حسابك بحاجة إلى التنشيط. يرجى تنشيط حسابك للمتابعة.";
                header('location: loginsystem/Activated_Account.php'); // توجيه المستخدم إلى صفحة التنشيط
                exit;
            }
   
      if (password_verify($Password, $foundUser['Password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['Account_ID'] = $foundUser['Account_ID']; // تم تصحيح اسم العمود
        $_SESSION['First_Name'] = $foundUser['First_Name'];
        $_SESSION['Last_Name'] = $foundUser['Last_Name'];
        $_SESSION['role'] = $foundUser['Position'];

        if ($foundUser['Position'] == '1' /*student*/) {
          header('location: Actors/student/');
        } elseif ($foundUser['Position'] == '8'  /**/) {
          header('location: admin');
        } elseif ($foundUser['Position'] == '2' /*Dean_of_the_College*/) {
          header('location: Actors/Dean_of_the_College/');
        } elseif ($foundUser['Position'] == '3' /*Program_Coordinator*/) {
          header('location: Actors/Program_Coordinator/');
        } elseif ($foundUser['Position'] == '4' /*Academic_Advisor*/) {
          header('location: Actors/Academic_Advisor/');
        } elseif ($foundUser['Position'] == '7' /*Faculty_Member*/) {
          header('location: Actors/Faculty_Member/');
        } elseif ($foundUser['Position'] == '6' /*President_of_the_University*/) {
          header('location: Actors/President_of_the_University/');
        } elseif ($foundUser['Position'] == '5' /*Vice_President_for_Academic_Affairs*/) {
          header('location: Actors/Vice_President_for_Academic_Affairs/');
        } else {
          header('location: index.php');
        }
      } else {
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
  <link rel="stylesheet" href="assets/css_rtl/bootstrap.min.css" />

  <!-- style css File RTL-->
  <link rel="stylesheet" href="assets/css_rtl/style.css" />
  <!-- style css File Ltr-->
  <!-- <link rel="stylesheet" href="css_ltr/style.css" /> -->
  <!-- Title Icon -->
  <link rel="icon" href="assets/img/fav-icon.png" />
  <title>تسجيل الدخول</title>
  <link href="assets/css/navbar.css" rel="stylesheet">
  <link href="assets/css/navbar.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <link rel="stylesheet" href="assets/css/index.css" />
  <style>
    body>div.container-fluid>div>div:nth-child(1)>div>div>form>div:nth-child(5)>button {
      background: linear-gradient(264.67deg, #7f7fd5 -9.26%, #86a8e7 45.82%, #91eae4 106.96%);
      font-size: large;
      border: 0px;
    }
    .navbar {
      margin-bottom: 20px;
      box-shadow: 0 4px 14px rgb(0 0 0 / 42%);
    }
    .llcol {
      background: linear-gradient(264.67deg, #7f7fd5 -9.26%, #86a8e7 45.82%, #91eae4 106.96%);

      border: 0px solid #fff;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="assets/img/logoo.png" style="width: 44px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

 
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
                  <input name="Password" type="Password" class="form-control" placeholder="كلمة المرور" />
                  <label for="كلمة المرور">كلمة المرور</label>
                  <span class="show-Password"></span>
                </div>
                <br>

         
                <a href="loginsystem/sendingcode.php" for="كلمة المرور">هل نسيت كلمة المرور؟</a><br>
                <br>
                <?php include './errors/errors.php'; ?>
                <div align="center">
                  <button type="submit" class="btn btn-primary btn-block llcol">تسجيل الدخول</button>
                  <!-- <a href="loginsystem/Activated_Account.php"><button type="button"
                      class="btn btn-primary btn-block llcol">انشاء - تفعيل الحساب الجامعي</button></a> -->
                </div>
              </form>
            </div>
          </div>
        </div>








        <div class="col-6 col-lg-6">
          <div class="card">
            <div class="card-body">
            <img src="assets/img/uu4.png" style="width: 100%; height: 100%;">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div class="overlay"></div>
  </div>
  </div>
  <!--Bootstrap  -->
  <script src="assets/js/js/bootstrap.bundle.min.js"></script>

  <!-- javascript file -->
  <script src="assets/js/js/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
  </script>
</body>
</html>