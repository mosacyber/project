
<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>التنبؤ بالتخرج</title>

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
    ?>

.table thead th, .jsgrid .jsgrid-table thead th {
    border-top: 0;
    border-bottom-width: 1px;
    font-weight: bold;
    font-size: 1rem;
    background-color: #392e6e;
    color: #fff;
}<?php 
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
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">    
<?php
// استدعاء ملف الشاشة البداية
$loading_path = "content/content.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $loading_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
?>
          </div>  
          <br><br>
          <div class="page-header">
            <h3 class="page-title">
            التنبؤ بالتخرج
            </h3>
          </div>

          <div class="row">
        <div class="col-xxl-12 col-md-12">
  <div class="card info-card sales-card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
        <thead>
         
         <tr>
       <?php

$sql4 = "SELECT * FROM students WHERE student_id = '{$_SESSION['Account_ID']}'";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
 
  $row4 = $result4->fetch_assoc();

  $student_id= $row4['student_id'];
}

$sql8 = "SELECT * FROM students where student_id = $student_id";
$result8 = $conn->query($sql8);
if ($result8->num_rows > 0) {
    $row8 = $result8->fetch_assoc();

    $school_type = $row8['School_type_id'];
    $school_percentage = $row8['school_percentage'];
    $aptitude_test = $row8['aptitude_test'];
    $acadmic_achievement = $row8['acadmic_achievement'];
}

$programming1=0; $programming2=0; $visual_programming =0;  $data_structure=0;
   

$sql10 = "SELECT grade FROM academic_record where student_id = $student_id AND subject_code = 'CSC101' 
AND Semster_Number  = (SELECT MAX(Semster_Number) FROM academic_record)";

$result10 = $conn->query($sql10);

if ($result10->num_rows > 0) {

    $row10 = $result10->fetch_assoc();
    $programming1 = $row10['grade'];

}

$sql11 = "SELECT grade FROM academic_record where student_id = $student_id AND subject_code = 'CSC201' 
AND Semster_Number  = (SELECT MAX(Semster_Number) FROM academic_record)";

$result11 = $conn->query($sql11);

if ($result11->num_rows > 0) {

    $row11 = $result11->fetch_assoc();
    $programming2 = $row11['grade'];

}

$sql12 = "SELECT grade FROM academic_record where student_id = $student_id AND subject_code = 'CSC301' 
AND Semster_Number  = (SELECT MAX(Semster_Number) FROM academic_record)";

$result12 = $conn->query($sql12);

if ($result12->num_rows > 0) {

    $row12 = $result12->fetch_assoc();
    $visual_programming = $row12['grade'];

}

$sql13 = "SELECT grade FROM academic_record where student_id = $student_id AND subject_code = 'CSC220' 
AND Semster_Number  = (SELECT MAX(Semster_Number) FROM academic_record)";

$result13 = $conn->query($sql13);

if ($result13->num_rows > 0) {

    $row13 = $result13->fetch_assoc();
    $data_structure = $row13['grade'];

}
$output=-1;
$mark = "التنبؤ غير متوفر لحد مايتم اجتياز مادة برمجة 1 وبرمجة 2 على الاقل.";
    if( $school_type > 0 && $school_percentage > 0 && $aptitude_test > 0 && $acadmic_achievement > 0 && $programming1 > 0 && $programming2 > 0 && $visual_programming > 0 && $data_structure > 0){
      
      $command = "java -cp \"C:\Program Files\Weka-3-8-6\\weka.jar;D:\Downloads_D\Java\Projects\GraduateProject\build\classes\" course_Predction.year3 $school_percentage $aptitude_test $acadmic_achievement $programming1 $programming2 $data_structure $visual_programming $school_type 2>&1";

      $output = shell_exec($command);
      ?>
              <th scope="col">نسبة المدرسة</th>
              <th scope="col">نوع المدرسة</th>
              <th scope="col"> القدرات العامة</th>
              <th scope="col"> التحصيل الدراسي</th>
              <th scope="col"> برمجة 1</th>
              <th scope="col"> برمجة 2</th>
              <th scope="col"> تراكيب البيانات والخواريزميات</th>
              <th scope="col"> البرمجة المرئية</th>
      <?php

    } elseif ($school_type > 0 && $school_percentage > 0 && $aptitude_test > 0 && $acadmic_achievement > 0 && $programming1 > 0 && $programming2 > 0) {
      
      $command = "java -cp \"C:\Program Files\Weka-3-8-6\\weka.jar;D:\Downloads_D\Java\Projects\GraduateProject\build\classes\" course_Predction2.year2 $school_percentage $aptitude_test $acadmic_achievement $programming1 $programming2 $school_type 2>&1";
    
      $output = shell_exec($command);
?>
              <th scope="col">نسبة المدرسة</th>
              <th scope="col">نوع المدرسة</th>
              <th scope="col"> القدرات العامة</th>
              <th scope="col"> التحصيل الدراسي</th>
              <th scope="col"> برمجة 1</th>
              <th scope="col"> برمجة 2</th>
<?php
    } else {

      $output=-2;
?>
              <th scope="col">نسبة المدرسة</th>
              <th scope="col">نوع المدرسة</th>
              <th scope="col"> القدرات العامة</th>
              <th scope="col"> التحصيل الدراسي</th>
<?php
    }
    if ($output == 1 || $output == 0) {
      $mark = "ممتاز";
      $pr_color = "#6fe381";
    } else if ($output == 2) {
      $mark = "جيد جدا";
      $pr_color = "#d3ef5e";
    } else if ($output == 3) {
      $mark = "جيد";
      $pr_color = "#fee43f";
    } else if ($output == 4) {
      $mark = "مقبول";
      $pr_color = "#f19c26";
    } else if ($output == -2) {
      $mark = "التنبؤ غير متوفر لحد مايتم اجتياز مادة برمجة 1 وبرمجة 2 على الاقل.";
      $pr_color = "#ed4c36";
    }else {
      $mark = "ضعيف";
      $pr_color = "#ed4c36";
    }
          
    $sql15 = "SELECT Prediction_grade_ID FROM Prediction WHERE student_id = $student_id AND Semster_Number = (SELECT MAX(Semster_Number) FROM Prediction)";
    $result15 = $conn->query($sql15);

if ($result15->num_rows > 0) {
    // Handle the case when a result is found and $output is -2
} else {
    // Handle the case when no result is found or $output is not -2
    if ($output != -2) {
        $sql16 = "INSERT INTO `prediction` (`Student_ID`, `Prediction_grade_ID`, `Semster_Number`) 
                  SELECT '$student_id', '$output', MAX(Semster_Number) FROM Prediction";
        if ($conn->query($sql16) === TRUE) {      
            // Insertion successful
        } else {
            echo "Error: " . $sql16 . "<br>" . $conn->error;
        }
    }
}

    
 ?>
       
</tr>
          </thead>
          <tbody>
        <tr>

<?php 




$sql = "SELECT * FROM school_type WHERE School_type_id  = $school_type";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $name_school = $row['School_type_name']; 
} else {
  $name_school = ''; 
}






if( $school_type > 0 && $school_percentage > 0 && $aptitude_test > 0 && $acadmic_achievement > 0 && $programming1 > 0 && $programming2 > 0 && $visual_programming > 0 && $data_structure > 0){  
?>
         <td><?php echo $school_percentage  ?></td>
         <td><?php echo $name_school  ?></td>
         <td><?php echo $aptitude_test  ?></td>
         <td><?php echo $acadmic_achievement  ?></td>
         <td><?php echo $programming1  ?></td>
         <td><?php echo $programming2  ?></td>
         <td><?php echo $data_structure  ?></td>
         <td><?php echo $visual_programming  ?></td>
         
<?php
  } elseif ($school_type > 0 && $school_percentage > 0 && $aptitude_test > 0 && $acadmic_achievement > 0 && $programming1 > 0 && $programming2 > 0) {
  ?>
         <td><?php echo $school_percentage  ?></td>
         <td><?php echo $name_school  ?></td>
         <td><?php echo $aptitude_test  ?></td>
         <td><?php echo $acadmic_achievement  ?></td>
         <td><?php echo $programming1  ?></td>
         <td><?php echo $programming2  ?></td>
<?php
  }else {
?>
         <td><?php echo $school_percentage  ?></td>
         <td><?php echo $name_school  ?></td>
         <td><?php echo $aptitude_test  ?></td>
         <td><?php echo $acadmic_achievement  ?></td>
<?php
  }
?>
         </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Sales Card -->    
     <div class="col-12">
  <div class="card">
    <div class="card-body">
      <h2 class="text-center">التقدير المتوقع الحصول عليه عند التخرج:</h2>
      <hr>
      <br>
      <div class="text-center">
        <?php
        switch ($mark) {
          case "A+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأخضر لتقدير A+
            break;
          case "A":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأزرق لتقدير A
            break;
          case "B+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأزرق الفاتح لتقدير B+
            break;
          case "B":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأصفر لتقدير B
            break;
          case "C+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون البرتقالي لتقدير C+
            break;
          case "C":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الرمادي لتقدير C
            break;
          case "D+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأحمر لتقدير D+
            break;
          case "D":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأحمر لتقدير D
            break;
          case "-2":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الرمادي للنص التنبؤ غير متوفر
            break;
          default:
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 29px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 400px 28px 400px;" class="text">' . $mark . '</h5>'; // اللون الأحمر لتقدير F
            break;
        }
        ?>
      </div>
    </div>
  </div>
</div>
<script>
    // الحصول على العنصر الذي يحتوي على شريط التقدم
    var progressBar = document.querySelector('.progress-bar');

    // قراءة النسبة المئوية من العنصر
    var percentage = parseFloat(progressBar.style.width);

    // حساب النسبة المئوية من 5
    var calculatedPercentage = (percentage / 100) * 5;

    // تحديث نص النسبة المئوية في العنصر
    progressBar.textContent = calculatedPercentage.toFixed(2) + " legH";

</script>
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
