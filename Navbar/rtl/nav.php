<?PHP session_start(); ?>
<?php   include __DIR__ . '../../../config/app.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<?php
// جلسة جديدة
// تعيين قيمة للمتغير في السشن

if(isset($_SESSION['role'])) {
$sql = "SELECT * FROM accounts WHERE Account_ID =$_SESSION[Account_ID]";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT MAX(Semester_Number) AS Max_Semester_Number FROM current_semester WHERE student_id = '$_SESSION[Account_ID]'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$_SESSION['Max_Semester_Number'] = $row2['Max_Semester_Number'];

$_SESSION['Name'] =$row['First_Name']." ".$row['Last_Name'];
$_SESSION['Mobile'] =$row['Mobile'];
$_SESSION['Email'] =$row['Email'];
$_SESSION['P'] =$row['Position'];
$_SESSION['about'] = "Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.";

$sql = "SELECT * FROM position WHERE position_id =$_SESSION[P]";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



$_SESSION['Position'] =$row['position_name'];

}else{
  header('location: '.$config['app_url'].'index.php');
}



echo '
<!-- partial:../../partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="' . $config['admin'] . '/index.php"><img src="../../images/logo.svg" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="' . $config['admin'] . '/index.php"><img src="../../images/logo-mini.svg" alt="logo"/></a>
   </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="fas fa-bars"></span>
    </button>
    
    <ul class="navbar-nav navbar-nav-right">
     
      <li class="nav-item dropdown d-none d-lg-flex">
        <div class="nav-link">
          <span class="dropdown-toggle btn btn-outline-dark" id="languageDropdown" data-toggle="dropdown">English</span>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
            <a class="dropdown-item font-weight-medium" href="#">
            English
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item font-weight-medium" href="#">
              Arabic
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="fas fa-bell mx-0"></i>
          <span class="count">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <a class="dropdown-item">
            <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
            </p>
            <span class="badge badge-pill badge-warning float-right">View all</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-danger">
                <i class="fas fa-exclamation-circle mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium">Application Error</h6>
              <p class="font-weight-light small-text">
                Just now
              </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="fas fa-wrench mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium">Settings</h6>
              <p class="font-weight-light small-text">
                Private message
              </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="far fa-envelope mx-0"></i>
              </div>
            </div> 
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium">New user registration</h6>
              <p class="font-weight-light small-text">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown" >
      <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="'.$config["app_url"].'mail/index.php" data-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-envelope mx-0"></i>
      </a>
    </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="../../assets/img/profile-img.png" alt="profile"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="fas fa-cog text-primary"></i>
            الاعدادات
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="'.$config["app_url"].'logout/logout.php">
            <i class="fas fa-power-off text-primary"></i>
            تسجيل خروج
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="fas fa-bars"></span>
    </button>
  </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:../../partials/_settings-panel.html -->
  <div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close fa fa-times"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
      <p class="settings-heading mt-2">HEADER SKINS</p>
      <div class="color-tiles mx-0 px-4">
        <div class="tiles primary"></div>
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default"></div>
      </div>
    </div>
  </div>

  <!-- partial -->
  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="../../assets/img/profile-img.png" alt="image"/>
          </div>
          <div class="profile-name">';
          if(isset($_SESSION['role'])) {
            echo '<p class="name">' . $_SESSION['Name'] . '</p>';
            echo ' <p id="Account_ID" class="designation">' . $_SESSION['Account_ID'] . '</p>';
          }
          echo '
          </div>
        </div>
      </li>';


/*********************************/
/*********************************/
/* الطالب */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '1') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'student">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="'.$config['Actors'].'student/Current_Semester.php">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">
        المقررات المسجلة
        </span>
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="'.$config['Actors'].'student/Prediction.php">
      <i class="fa fa-home menu-icon"></i>
      <span class="menu-title">
      التنبؤ 
      </span>
    </a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="'.$config['Actors'].'student/acadmic_record.php">
      <i class="fa fa-home menu-icon"></i>
      <span class="menu-title">
السجل الاكاديمي
      </span>
    </a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="'.$config['app_url'].'mail">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
التواصل
    </span>
  </a>
</li>
 
     ';
      }
/*********************************/
/*********************************/
/* الطالب */
/*********************************/
/*********************************/



















/*********************************/
/*********************************/
/* المرشد الاكاديمي */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '4') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'Academic_Advisor">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>

  <li class="nav-item">
  <a class="nav-link" href="'.$config['Actors'].'Faculty_Member/Subject_grades.php">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
 المواد
    </span>
  </a>
</li>

  <li class="nav-item">
  <a class="nav-link" href="'.$config['app_url'].'mail">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
التواصل
    </span>
  </a>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
  <i class="fab fa-trello menu-icon"></i>
  <span class="menu-title">
المرشد الاكاديمي 
 </span>
  <i class="menu-arrow"></i>
</a>
<div class="collapse" id="page-layouts">
  <ul class="nav flex-column sub-menu">
   
    <li class="nav-item"> 
    <a class="nav-link" href="'.$config['Actors'].'Academic_Advisor/students.php">
    الطلاب 
    </a>
    </li>
    <li class="nav-item d-none d-lg-block"> 
    <a class="nav-link" href="'.$config['Actors'].'Academic_Advisor/report.php">
    التقارير 
    </a>
    </li>
  </ul>
</div>
</li>
     ';
      }
/*********************************/
/*********************************/
/* المرشد الاكاديمي */
/*********************************/
/*********************************/






/*********************************/
/*********************************/
/*  عضو هيئة التدريس */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '7') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'Faculty_Member">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>

  <li class="nav-item">
  <a class="nav-link" href="'.$config['Actors'].'Faculty_Member/Subject_grades.php">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
 المواد
    </span>
  </a>
</li>

  <li class="nav-item">
  <a class="nav-link" href="'.$config['app_url'].'mail">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
التواصل
    </span>
  </a>
</li>

     ';
      }
/*********************************/
/*********************************/
/*  عضو هيئة التدريس */
/*********************************/
/*********************************/






/*********************************/
/*********************************/
/*  العميد */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '2') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'Dean_of_the_College">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>
      </li>

<li class="nav-item">
<a class="nav-link" href="'.$config['Actors'].'Dean_of_the_College/report.php">
  <i class="fa fa-home menu-icon"></i>
  <span class="menu-title">
التقارير
  </span>
</a>
</li>


     ';
      }
/*********************************/
/*********************************/
/*  العميد */
/*********************************/
/*********************************/



/*********************************/
/*********************************/
/*  مدير الجامعة */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '6') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'President_of_the_University">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>
      </li>

<li class="nav-item">
<a class="nav-link" href="'.$config['Actors'].'President_of_the_University/report.php">
  <i class="fa fa-home menu-icon"></i>
  <span class="menu-title">
التقارير
  </span>
</a>
</li>


     ';
      }
/*********************************/
/*********************************/
/*   مدير الجامعة  */
/*********************************/
/*********************************/



/*********************************/
/*********************************/
/*    وكيل الطلاب لشؤون التعليمية  */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '5') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'Vice_President_for_Academic_Affairs">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>
      </li>

<li class="nav-item">
<a class="nav-link" href="'.$config['Actors'].'Vice_President_for_Academic_Affairs/report.php">
  <i class="fa fa-home menu-icon"></i>
  <span class="menu-title">
التقارير
  </span>
</a>
</li>


     ';
      }
/*********************************/
/*********************************/
/*    وكيل الطلاب لشؤون التعليمية  */
/*********************************/
/*********************************/


/*********************************/
/*********************************/
/*  admin */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '8') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['admin'] . '">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>
      </li>

<li class="nav-item">
<a class="nav-link" href="'.$config['admin'].'/data.php">
  <i class="fa fa-home menu-icon"></i>
  <span class="menu-title">
البيانات
  </span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="'.$config['admin'].'/report2.php">
  <i class="fa fa-home menu-icon"></i>
  <span class="menu-title">
التقارير
  </span>
</a>
</li>

     ';
      }
/*********************************/
/*********************************/
/*  admin */
/*********************************/
/*********************************/









/*********************************/
/*********************************/
/*  منسق البرنامج */
/*********************************/
/*********************************/
if(isset($_SESSION['role']) && $_SESSION['role'] === '3') {
  echo'      <li class="nav-item">
  <a class="nav-link" href="' . $config['Actors'] . 'Program_Coordinator">
    <i class="fa fa-home menu-icon"></i>
    <span class="menu-title">
    الصفحه الرئيسية
    </span>
  </a>
</li>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="'.$config['Actors'].'Faculty_Member/Subject_grades.php">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">
     المواد
        </span>
      </a>
    </li>
    
      <li class="nav-item">
      <a class="nav-link" href="'.$config['app_url'].'mail">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">
    التواصل
        </span>
      </a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
      <i class="fab fa-trello menu-icon"></i>
      <span class="menu-title">
    منسق البرنامج 
     </span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="page-layouts">
      <ul class="nav flex-column sub-menu">
       
      
        <li class="nav-item d-none d-lg-block"> 
        <a class="nav-link" href="'.$config['Actors'].'Program_Coordinator/report.php">
        التقارير 
        </a>
        </li>
      </ul>
    </div>
    </li>
         ';
          }
/*********************************/
/*********************************/
/*  منسق البرنامج */
/*********************************/
/*********************************/











      echo'
      <li class="nav-item">
        <a class="nav-link" href="'.$config['app_url'].'/logout/logout.php">
          <i class="bi bi-box-arrow-right" style="margin-left: 10px;"></i>
          <span class="menu-title">تسجيل خروج</span>
        </a>
      </li>
    </ul>
  </nav>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">



';

?>