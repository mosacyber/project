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
          <div class="col-md-12 grid-margin ">
            <div class="card">
                <div class="card-body">               
                  <div class="template-demo">
                    <nav>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                         الصفحة الرئيسية 
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
السجل الاكاديمي
            </h3>
          </div>

          <div class="row">
            







          <?php
// متغير لتتبع عرض الجدول لكل سمستر
$table_displayed = array();

// استعلام SQL لاسترداد بيانات معينة من الجدول
$sql = "SELECT * FROM current_semester WHERE student_id = {$_SESSION['Account_ID']} ORDER BY Semester_Number DESC";
$result = $conn->query($sql);

// التحقق من وجود نتائج
if ($result->num_rows > 0) {
    // عرض البيانات لكل فصل دراسي
    while ($row = $result->fetch_assoc()) {
        // تحديد الفصل الدراسي بناءً على قيمة Semester_Number
        $semester_number = $row["Semester_Number"];
        $last_digit = substr($semester_number, -1);
        $semester_name = "";

        switch ($last_digit) {
            case "1":
                $semester_name = "الأول";
                break;
            case "2":
                $semester_name = "الثاني";
                break;
            case "3":
                $semester_name = "الثالث";
                break;
            default:
                $semester_name = "غير محدد";
                break;
        }

        // التحقق من عدم عرض الجدول لهذا السمستر بالفعل
        if (!isset($table_displayed[$semester_number])) {
            // عرض اسم الفصل الدراسي
            echo '<h4>الفصل الدراسي : <span>' . $semester_name . '</span></h4>';
            echo '<h4>العام الدراسي : 14' . substr($semester_number, 0, 2) . 'هـ</span></h4>';

            // استعلام SQL لاسترداد بيانات المواد للفصل الدراسي الحالي
            $sql_subjects = "SELECT c.subject_code, s.subject_name, s.credit_hours, IFNULL(ar.grade, 'غير متوفرة') AS grade
            FROM current_semester c
            INNER JOIN subjects s ON c.subject_code = s.subject_code
            LEFT JOIN academic_record ar ON c.student_id = ar.student_id AND c.subject_code = ar.subject_code AND c.Semester_Number = ar.Semster_Number
            WHERE c.student_id = {$_SESSION['Account_ID']} AND c.Semester_Number = '$semester_number'
            ORDER BY c.Semester_Number DESC
            ";
            $result_subjects = $conn->query($sql_subjects);

            // التحقق من وجود نتائج
            if ($result_subjects->num_rows > 0) {
                // عرض بداية الجدول
                echo "
                <div class='col-xxl-12 col-md-12'>
                  <div class='card info-card sales-card'>
                    <div class='card-body'>
                      <div class='table-responsive'>
                        <table class='table'>
                          <thead>
                            <tr>
                              <th scope='col'>رمز المقرر</th>
                              <th scope='col'>اسم المقرر</th>
                              <th scope='col'>الساعات</th>
                              <th scope='col'>التقدير</th>
                              <th scope='col'>العلامة</th>
                            </tr>
                          </thead>
                          <tbody>";

                while ($row_subject = $result_subjects->fetch_assoc()) {

                  if (!empty($row_subject['grade']) && is_numeric($row_subject['grade'])) {
                    if ($row_subject['grade'] >= 95) {
                        $mark = "A+";
                    } else if ($row_subject['grade'] >= 90) {
                      $mark = "A";
                     } else if ($row_subject['grade'] >= 85) {
                      $mark = "B+";
                     } else if ($row_subject['grade'] >= 80) {
                      $mark = "B";
                     } else if ($row_subject['grade'] >= 75) {
                      $mark = "C+";
                     } else if ($row_subject['grade'] >= 70) {
                      $mark = "C";
                     } else if ($row_subject['grade'] >= 65) {
                      $mark = "D+";
                     } else if ($row_subject['grade'] >= 60) {
                      $mark = "D";
                     }else {
                        $mark = "F";
                    }
                } else {
                    $mark = "غير متوفرة";
                }
                
                    // عرض بيانات المقرر في الجدول
                    echo "<tr>";
                    echo "<td>{$row_subject['subject_code']}</td>";
                    echo "<td>{$row_subject['subject_name']}</td>";
                    echo "<td>{$row_subject['credit_hours']}</td>";
                    echo "<td>{$row_subject['grade']}</td>";
                    echo "<td>$mark</td>";
                    echo "</tr>";
                }

// إغلاق الجدول
echo "
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<h1></h1>
<!-- Sales Card -->
<div class='col-xxl-12 col-md-12'>
  <div class='card info-card sales-card'>
    <div class='card-body'>
    
      <h5>
        فصلي
      </h5><br>
      <h5>
        تراكمي
      </h5>
    </div>
  </div>
</div>



<!-- End Sales Card --><h1><h1>
";


                // تعيين قيمة للتأكيد على عرض الجدول لهذا السمستر بالفعل
                $table_displayed[$semester_number] = true;
            } else {
                echo '<p>لا توجد مواد لعرضها في هذا الفصل الدراسي.</p>';
            }
        }
    }
} else {
    echo '<p>لا توجد نتائج متاحة لعرضها.</p>';
}
?>









































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
 download_js();
 print_js();
?>



  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- تضمين Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<?php
    $navbar_path = "tools/js.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}


?>






<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
</html>
