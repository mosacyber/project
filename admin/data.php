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


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">
        <!-- Revenue Card -->
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
        </div>
        <!-- content-wrapper ends -->


          </div><br>


  




<!-- Revenue Card -->
<div class="col-md-12">
    <div class="row">





        <!-- Sales Card
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

           

          <a href="add.php"> 
            <div class="card-body">
              <h5 class="card-title"> </h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6> اضافه </h6>

                </div>
              </div>
            </div>
          </a> 

          </div><br>
        </div> End Sales Card -->














        <div class="col-lg-12 ">
            <div class="card"><!--  academic_record اعلى سمستر -->
            <div class="card-body">

    <div class="form-group">
      
        <label for="position">البيانات</label>
        <select name="position" class="form-control" id="position">
            <option value="all">الكل</option>
            <?php
            // استعلام SQL لاسترداد البيانات من جدول الفئات
            $sql = "SELECT position_id, position_name FROM position";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // حلق عبر كل الصفوف وأنشئ خيارات القائمة المنسدلة
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['position_id'] . '">' . $row['position_name'] . '</option>';
                }
            } else {
                echo '<option value="">لا توجد بيانات متاحة</option>';
            }
            ?>
        </select>
    </div>

    <div id="table-container">
        <!-- هنا سيتم عرض الجدول -->
    </div>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var positionSelect = document.getElementById("position");

        positionSelect.addEventListener("change", function() {
            var selectedValue = this.value;

            // إذا تم اختيار القيمة "all"، قم بإرسال استعلام AJAX لاسترجاع جميع البيانات
            var url = "ajax.php";
            var data = "selectedValue=" + encodeURIComponent(selectedValue);

            // استخدم AJAX لإرسال الاستعلام إلى الخادم
            var xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // عند استلام البيانات بنجاح، قم بتحديث الجدول
                    document.getElementById("table-container").innerHTML = xhr.responseText;
                }
            };
            xhr.send(data);
        });
    });
    </script>
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



        <!-- partial -->
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