<?php   include __DIR__ . '../../../config/app.php'; ?>



<?php

echo '


<!-- partial:../../partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="../../index-2.html"><img src="../../images/logo.svg" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="../../index-2.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="fas fa-bars"></span>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item nav-search d-none d-md-flex">
        <div class="nav-link">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
          </div>
        </div>
      </li>
    </ul>
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
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-envelope mx-0"></i>
          <span class="count">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <div class="dropdown-item">
            <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
            </p>
            <span class="badge badge-info badge-pill float-right">View all</span>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                <span class="float-right font-weight-light small-text">1 Minutes ago</span>
              </h6>
              <p class="font-weight-light small-text">
                The meeting is cancelled
              </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="../../images/faces/face2.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                <span class="float-right font-weight-light small-text">15 Minutes ago</span>
              </h6>
              <p class="font-weight-light small-text">
                New product launch
              </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                <span class="float-right font-weight-light small-text">18 Minutes ago</span>
              </h6>
              <p class="font-weight-light small-text">
                Upcoming board meeting
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="../../images/faces/face5.jpg" alt="profile"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="fas fa-cog text-primary"></i>
            Settings
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout/logout.php">
            <i class="fas fa-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-block">
        <a class="nav-link" href="#">
          <i class="fas fa-ellipsis-h"></i>
        </a>
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
  <div id="right-sidebar" class="settings-panel">
    <i class="settings-close fa fa-times"></i>
    <ul class="nav nav-tabs" id="setting-panel" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section" aria-expanded="true">TO DO LIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
      </li>
    </ul>
    <div class="tab-content" id="setting-content">
      
      <!-- To do section tab ends -->
      <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
        <div class="d-flex align-items-center justify-content-between border-bottom">
          <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
          <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
        </div>
        <ul class="chat-list">
          <li class="list active">
            <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Thomas Douglas</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">19 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
            <div class="info">
              <div class="wrapper d-flex">
                <p>Catherine</p>
              </div>
              <p>Away</p>
            </div>
            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
            <small class="text-muted my-auto">23 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Daniel Russell</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">14 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
            <div class="info">
              <p>James Richardson</p>
              <p>Away</p>
            </div>
            <small class="text-muted my-auto">2 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Madeline Kennedy</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">5 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Sarah Graves</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">47 min</small>
          </li>
        </ul>
      </div>
      <!-- chat tab ends -->
    </div>
  </div>
  <!-- partial -->
  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="../../images/faces/face5.jpg" alt="image"/>
          </div>
          <div class="profile-name">
            <p class="name">
               مرحبا موسى
            </p>
            <p class="designation">
              Super Admin
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="'.$config['app_url'].'index.php">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">
          الصفحه الرئيسية
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="fab fa-trello menu-icon"></i>
          <span class="menu-title">
          عرض البيانات
          </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> 
            <a class="nav-link" href="#">
            جميع البيانات
            </a>
            </li>
            <li class="nav-item"> 
            <a class="nav-link" href="#">
            بيانات الطلاب
            </a>
            </li>
            <li class="nav-item d-none d-lg-block"> 
            <a class="nav-link" href="#">
            بيانات اعضاء التدريس
            </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
          <i class="fas fa-columns menu-icon"></i>
          <span class="menu-title">
          متابعه وانشاء التقارير
          </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="sidebar-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
            <a class="nav-link" href="#">
            Compact menu
            </a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#">
            Icon menu
            </a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#">
            Sidebar Hidden
            </a>
            </li>
            <li class="nav-item"> 
            <a class="nav-link" href="#">
            Sidebar Overlay
            </a>
            </li>
            <li class="nav-item"> 
            <a class="nav-link" href="#">
            Sidebar Fixed
            </a>
            </li>
          </ul>
        </div>
      </li> 
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" data-toggle="collapse" href="#layouts3" aria-expanded="false" aria-controls="layouts3">
          <i class="fas fa-columns menu-icon"></i>
          <span class="menu-title">
اعدادات النظام
          </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="layouts3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
            <a class="nav-link" href="#">
            الاعدادت الاساسية
            </a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="'.$config['admin'].'/pages/manager/logs.php">
            سجلات النظام
            </a>
            </li>
          </ul>
        </div>
      </li> 
     
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