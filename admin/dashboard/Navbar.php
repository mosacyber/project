<?php

include '../../config/app.php';


echo '


<nav  id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse ttrr">
<div class="position-sticky pt-3">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="'; echo $config['app_url'];echo'admin/dashboard/index.php">
      
        <span data-feather="home"></span>
        لوحة القيادة
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="'; echo $config['app_url'];  echo'admin/dashboard/accounts.php">
        <span data-feather="users"></span>
        عرض البيانات
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="bar-chart-2"></span>
        متابعة وانشاء التقارير
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="layers"></span>
        ادارة بيانات النظام
      </a>
    </li>
  </ul>
    
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#"></a></li>
        <li><a class="dropdown-item" href="#">الاعدادات</a></li>
        <li><a class="dropdown-item" href="#">الحساب</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item sign-out" href="';echo $config['app_url'];echo'logout/logout.php">تسجيل الخروج</a></li>
      </ul>
    </div>
    

  
</div>
</nav>


';






?>