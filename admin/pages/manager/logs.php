<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />


</head>
<body class="rtl">
  <div class="container-scroller">
<?php include '../../../Navbar/rtl/nav.php'?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">
          <div class="col-md-12 grid-margin ">
            <div class="card">
                <div class="card-body">               
                  <div class="template-demo">
                    <nav>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item " aria-current="page">
                         الصفحة الرئيسية 
                      </li> <li class="breadcrumb-item " aria-current="page">
                         اعدادات النظام  
                      </li> <li class="breadcrumb-item active" aria-current="page">
                        سجلات النظام
                      </li>
                      </ol>
                    </nav>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="page-header">
            <h3 class="page-title">
              سجلات النظام
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
عدد الطلاب والطالبات
                        </p>
                        <h2>54000</h2>
                        <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Avg Time
                        </p>
                        <h2>123.50</h2>
                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                          عدد التقارير
                        </p>
                        <h2>3500</h2>
                        <label class="badge badge-outline-success badge-pill">12% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          عدد التحميلات
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          عدد الطلاب المتعثرين
                        </p>
                        <h2>9000</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Pending
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">جدول بيانات</h4>
                  <p class="card-description">
جدول الطلاب المتعثرين
                  </p>
                  <div class="table-responsive">      <button onclick='printRecord("")' class="btn btn-secondary"><i class="bi bi-printer"></i> طباعة</button>

                  <button id="downloadButton" onclick="downloadData()" class="btn btn-primary"><i class="bi bi-cloud-download"></i> تنزيل البيانات</button>
      <div id="loadingIndicator" style="display: none;">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">جارٍ التحميل...</span>
        </div>
      </div>
      
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include '../../../db/data.php';?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>



            </div>
   
          </div>
       
       
       


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">الملكية الفكرية © 2024 <a href="https://mousacyber.com/" target="_blank">mousacyber</a>. جميع الحقوق محفوظة</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">موسى بارقي & صنع بحب <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../../js/off-canvas.js"></script>
  <script src="../../../js/hoverable-collapse.js"></script>
  <script src="../../../js/misc.js"></script>
  <script src="../../../js/settings.js"></script>
  <script src="../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>



















<?php include '../../../download/download.php' ?>











<?php include '../../../print/print.php' ?>




<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
</html>
