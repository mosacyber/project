<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>

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

.table thead th, .jsgrid .jsgrid-table thead th {
    border-top: 0;
    border-bottom-width: 1px;
    font-weight: bold;
    font-size: 1rem;
    background-color: #392e6e;
    color: #fff;
}
  </style>
</head>
<body class="rtl">
  <div class="container-scroller">


<?php 
$navbar_path = "Navbar/rtl/nav.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?>


      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">
          <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الوظيفي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>
                  </div>
        </div>
        </div>
        </div><br>
          </div>
          <div class="page-header">
            <h3 class="page-title">
بيانات الحسابات
            </h3>
          </div>

  




<!-- Revenue Card -->
<div class="col-md-12">
    <div class="row">









    
    <div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد الطلاب</h4>
            <?php
            $sql = "SELECT COUNT(*) AS total_students FROM accounts WHERE Position  = 1";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_students = $row['total_students'];
                echo "<h3>$total_students</h3>";
            } else {
                echo "<p>لا توجد بيانات</p>";
            }
            ?>
        </div>
    </div>
</div>



<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد اعضاء هيئة التدريس</h4>
            <?php
            $sql = "SELECT COUNT(*) AS total_students FROM accounts WHERE Position  = 7";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_students = $row['total_students'];
                echo "<h3>$total_students</h3>";
            } else {
                echo "<p>لا توجد بيانات</p>";
            }
            ?>
        </div>
    </div>
</div>


<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد العمداء  </h4>
            <?php
            $sql = "SELECT COUNT(*) AS total_students FROM accounts WHERE Position  = 2            ";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_students = $row['total_students'];
                echo "<h3>$total_students</h3>";
            } else {
                echo "<p>لا توجد بيانات</p>";
            }
            ?>
        </div>
    </div>
</div>









<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد منسقين البرامج  </h4>
            <?php
            $sql = "SELECT COUNT(*) AS total_students FROM accounts WHERE Position  = 3";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_students = $row['total_students'];
                echo "<h3>$total_students</h3>";
            } else {
                echo "<p>لا توجد بيانات</p>";
            }
            ?>
        </div>
    </div>
</div>









<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد وكلاء الجامعه  </h4>
            <?php
            $sql = "SELECT COUNT(*) AS total_students FROM accounts WHERE Position  = 5";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_students = $row['total_students'];
                echo "<h3>$total_students</h3>";
            } else {
                echo "<p>لا توجد بيانات</p>";
            }
            ?>
        </div>
    </div>
</div>




    </div>
</div>
</div>



        

        
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

</body>















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
