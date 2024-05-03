<!DOCTYPE html>
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
          <div class="page-header">
            <h3 class="page-title">
            لوحه البيانات للطالب
            </h3>
          </div>

          <div class="row">
            


























        <!-- Revenue Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php

$sql4 = "SELECT * FROM students WHERE student_id = '{$_SESSION['Account_ID']}'";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();

    $sql5 = "SELECT * FROM programs WHERE Program_ID = {$row4['Program_ID']}";
    $result5 = $conn->query($sql5);

    $firstDigit = substr($row4['Program_ID'], 0, 1);

    $startPosition = 1; // الموضع البدئي للرقمين المطلوبين
    $middleDigits = substr($row4['Program_ID'], $startPosition, 2); // يأخذ رقمين ابتداءً من الموضع البدئي
    

    $endDigits = substr($row4['Program_ID'], -2);
    



    $sql6 = "SELECT * FROM colleges WHERE College_ID = $firstDigit";
    $result6 = $conn->query($sql6);
    if ($result6->num_rows > 0) {
        $row6 = $result6->fetch_assoc();


        $College_Name= $row6['College_Name'];
        

    }

    $sql7 = "SELECT * FROM departments WHERE Department_ID = '{$firstDigit}{$middleDigits}'";
    $result7 = $conn->query($sql7);
    if ($result7->num_rows > 0) {
        $row7 = $result7->fetch_assoc();


        $Department_Name= $row7['Department_Name'];
        

    }










    if ($result5->num_rows > 0) {
        $row5 = $result5->fetch_assoc();
    } else {
        // عرض التنبيه في حالة عدم العثور على البرنامج
        echo "
        <div class='alert alert-danger'>
            <p>تنبيه: لا يوجد بيانات برنامج</p>
        </div>";
        // تعيين قيم افتراضية
        $row5 = array('Program_Name' => 'برنامج غير معروف'); 
    }

    if (isset($_SESSION['role'])) {
        // تحديد التخصص والدرجة العلمية استنادًا إلى قيمة $_SESSION['role']
        switch ($_SESSION['role']) {
            case '1':
                $Specialization = "";
                $Degree = "طالب";
                $Major = $row5['Program_Name'];
                break;
            default:
                // تعيين التخصص الافتراضي هنا في حالة عدم تطابق أي من الحالات السابقة
                break;
        }
    }
} else {
    // عرض التنبيه في حالة عدم العثور على الطالب
    echo "
    <div class='alert alert-danger'>
        <p>تنبيه: لا يوجد بيانات طالب</p>
    </div>";
    // تعيين قيم افتراضية
    $row4 = array();
    $row5 = array('Program_Name' => 'برنامج غير معروف');
    $Specialization = "تخصص غير معروف";
    $Degree = "درجة غير معروفة";
    $Major = "تخصص غير معروف";
}




                ?>            



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الجامعي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">التخصص</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Major ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الدرجه العلميه</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Degree ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">القسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Department_Name ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الكليه</div>
                    <div class="col-lg-9 col-md-8"><?php echo $College_Name ?></div>
                  </div>



          </div>
        </div><!-- End Revenue Card -->














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
