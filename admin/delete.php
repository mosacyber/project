<?php
// في بداية الملف
ob_start();
?><!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>الصفحة الرئيسية</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  
  <?php
    $navbar_path = "tools/css.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
    ?>
  <style>
    <?php
    $navbar_path = "tools/tools.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
    download_css();
    print_css();
    footer_css()
    ?>
<?php 
$navbar_path = "loading/loading.css";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?> 
</style>
</head>
<body class="rtl">
  <div class="container-scroller">
<?php
// استدعاء ملف التصميم
$navbar_path = "Navbar/rtl/nav.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
// استدعاء ملف الشاشة البداية
$loading_path = "loading/loading.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $loading_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
?>


      
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
            <h3 class="page-title">
             الحذف
            </h3>
          </div>

          <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
          <?php
if(isset($_POST['Account_ID'])) {
    $account_id = $_POST['Account_ID'];

    // استعلام لاسترجاع البيانات لعرضها في النموذج
    $sql = "SELECT * FROM accounts WHERE Account_ID = $account_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $full_name= $row['First_Name']." ".$row['Last_Name'];

    $sql2 = "SELECT	*  FROM position where position_id= $row[Position]";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

?>
  <form action="" method="post">
    <input type="hidden" name="Account_ID" value="<?php echo $account_id; ?>">
    <div class="tab-content pt-2">
      <div class="tab-pane fade show active profile-overview" id="profile-overview">
        <h1>هل انت متاكد من حذف بيانات <?php echo $full_name?> !</h1>
        <div class="row mb-3">
          <h3 class="col-lg-3 col-md-4 label ">الرقم الجامعي : <span><?php echo $account_id?></span></h3>
        </div>
        <div class="row mb-3">
          <h3 class="col-lg-3 col-md-4 label ">المنصب : <span><?php echo $row2['position_name']?></span></h3>
        </div>













          <div class="col-lg-3 col-md-4 label "></div>
          <button type="submit" name="delete" class="btn btn-danger">حذف البيانات</button>
      </div>
    </div>
  </form>
<?php
} else {
    echo "لم يتم تمرير أي قيمة لتحديث";
}









if(isset($_POST['delete'])) {
    // استخدم استعلام SQL لتحديث البيانات
    $DELETE_sql = "DELETE FROM accounts WHERE Account_ID='$account_id'";
    
    if ($conn->query($DELETE_sql) === TRUE) {
        ?>
         <script>setTimeout(function(){ window.location.href = "done.php"; }, 200);</script>
        <?php
        // تأخير التحويل لمدة 3 ثواني قبل التوجيه إلى الصفحة الرئيسية

    } else {
        echo "حدث خطأ أثناء حذف البيانات: " . $conn->error;
    }
}


?>




        </div>
        </div>

        </div>
        <!-- content-wrapper ends -->

        
<?php
$navbar_path = "footer/Footer.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?>



        
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>



  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <!-- Vendor JS Files -->
   <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>







 








  <?php
// Download and print JavaScript functions (presumably defined elsewhere)
download_js();
print_js();
?>
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php
$navbar_path = "tools/js.php";

// Search for navbar.php in parent directories
for ($i = 0; $i < 9; $i++) {
  $path = str_repeat("../", $i) . $navbar_path;
  if (file_exists($path)) {
    include $path;
    break;
  }
}
?>

</html>
<?php
// في نهاية الملف
ob_end_flush();
?>