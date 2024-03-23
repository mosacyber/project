<?php


// معرفة اسم الصفحة الحالية
$currentPage = basename($_SERVER['PHP_SELF']);
// التحقق من كونها صفحة index
if ($currentPage === 'index.php') {
  // تضمين ملف config/app.php
  include '../config/app.php';

  // ... باقي الكود الخاص بك ...
}/*elseif ($currentPage === 'Student.php') {
  include '../../../config/app.php';

  # code...
}*/



// معرفة المسار الحالي للصفحة
$currentPage = $_SERVER['SCRIPT_FILENAME'];

// التحقق مما إذا كان المسار يحتوي على مجلد "manager"
if (strpos($currentPage, '/manager/') !== false) {
    // تضمين ملف app.php بناءً على المسار
    include '../../../config/app.php';
} else if (strpos($currentPage, '/Student/') !== false) {
  // تضمين ملف app.php بناءً على المسار
  include '../../../config/app.php';
}else if (strpos($currentPage, '/pages/') !== false) {
  // تضمين ملف app.php بناءً على المسار
  include '../../config/app.php';
}else if(strpos($currentPage, '/Settings/') !== false){
  include '../../config/app.php';
}


















echo '

<nav class="navbar navbar-light bg-white fixed-top ms-auto" style="box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);">
  <div class="container-fluid">
 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
            aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: black;"></span>
    </button>
    <h1 class="navbar-brand mb-auto h1">
    لوحة التحكم 
    <span>






   




    <button id="Switch_theme" class="mode-switch" title="Switch Theme">
    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
      <defs></defs>
      <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
    </svg>
  </button>
  






















    </span></h1>
  </div>
</nav>



 
<div class="bounceInDown sidebar collapse bg-white" id="sidebarCollapse">
  


<ul class="sidebar-nav">
<li class="sidebar-item li-hover">
  <a href="'. $config['admin'] .'" class="sidebar-link">
    <i class="fa-solid fa-home pe-2"></i>
الصفحة الرئيسية
  </a>
</li>

<li class="sidebar-item li-hover">
  <a
    href="#"
    class="sidebar-link collapsed"
    data-bs-target="#pages"
    data-bs-toggle="collapse"
    aria-expanded="false"
    ><i class="fa-solid fa-file-lines pe-2"></i>
عرض البيانات
  </a>
  <ul
    id="pages"
    class="sidebar-dropdown list-unstyled collapse"
    data-bs-parent="#sidebar"
  >
    <li class="sidebar-item li-child">
      <a href="' . $config['admin'] . 'pages/show_data.php" class="sidebar-link">جميع البيانات</a>
    </li>
    <li class="sidebar-item li-child">
    <a href="' . $config['admin'] . 'pages/Student/Student.php" class="sidebar-link">بيانات الطلاب</a>
    </li>
    <li class="sidebar-item li-child">
      <a href="#" class="sidebar-link">بيانات اعضاء التدريس</a>
    </li>
  </ul>
</li>

<li class="sidebar-item li-hover">
  <a
    href="#"
    class="sidebar-link collapsed"
    data-bs-target="#auth"
    data-bs-toggle="collapse"
    aria-expanded="false"
    ><i class="fa-regular fa-user pe-2"></i>
    متابعه وانشاء التقارير
          </a>
  <ul
    id="auth"
    class="sidebar-dropdown list-unstyled collapse"
    data-bs-parent="#sidebar"
  >
    <li class="sidebar-item li-child">
      <a href="#" class="sidebar-link">1</a>
    </li>
    <li class="sidebar-item li-child">
      <a href="#" class="sidebar-link">2</a>
    </li>
    <li class="sidebar-item li-child">
      <a href="#" class="sidebar-link">2</a>
    </li>
  </ul>
</li>
<li class="sidebar-header lable">اعدادات الحساب</li>
<li class="sidebar-item li-hover">
  <a
    href="#"
    class="sidebar-link collapsed"
    data-bs-target="#multi"
    data-bs-toggle="collapse"
    aria-expanded="false"
    ><i class="fa-solid fa-share-nodes pe-2"></i>
الاعدادات
  </a>
  <ul
    id="multi"
    class="sidebar-dropdown list-unstyled collapse"
    data-bs-parent="#sidebar"
  >
    <li class="sidebar-item">
      <a
        href="#"
        class="sidebar-link collapsed"
        data-bs-target="#level-1"
        data-bs-toggle="collapse"
        aria-expanded="false"
        >الاعدادات الاوليه</a
      >
      <ul
        id="level-1"
        class="sidebar-dropdown list-unstyled collapse"
      >
        <li class="sidebar-item li-child">
          <a href="#" class="sidebar-link">1 </a>
        </li>
        <li class="sidebar-item li-child">
          <a href="#" class="sidebar-link">2</a>
        </li>
      </ul>
    </li>
  </ul>
</li>

</ul>





  </div>
</div>
';
?>















<!--










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
















<nav class="navbar navbar-light bg-white fixed-top ms-auto" style="box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
            aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: black;"></span>
    </button>
    <h1 class="navbar-brand mb-auto h1">لوحة التحكم</h1>
  </div>
</nav>




<div class="bounceInDown sidebar collapse bg-white" id="sidebarCollapse">
  <ul class="nav flex-column">
  <li class="nav-item">
  <a class="nav-link text-dark" href="'. $config['admin'] .'">
  الصفحه الرئيسية 
  </a>
</li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="' . $config['admin'] . 'pages/show_data.php">
        عرض البيانات
      </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-dark" href="' . $config['admin'] . 'pages/Student/Student.php">
  ــ بيانات الطلاب
    </a>
  </li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="#">متابعه وانشاء التقارير</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="' . $config['admin'] . 'pages/manager/manager.php">إدارة النظام</a>
    </li>
    
  </ul>

 
  <div class="dropdown dropup rrrt">  <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
  data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>موسى بارقي</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="#"></a></li>
      <li><a class="dropdown-item" href="' . $config['admin'] . 'Settings/Settings.php">الاعدادات</a></li> <li><a class="dropdown-item" href="#">الحساب</a></li>
      <li><hr class="dropdown-divider"></li>
      <li>
        <a class="dropdown-item sign-out" href="' . ($config['app_url']) . 'logout/logout.php">
          تسجيل الخروج
        </a>
      </li>
    </ul>
  </div>
</div>

-->