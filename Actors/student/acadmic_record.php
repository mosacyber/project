<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

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

    .table thead th,
    .jsgrid .jsgrid-table thead th {
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
          // تعيين المتغير الذي سيتم استخدامه لتتبع عرض الفصل والعام الدراسي
          $semester_displayed = false;
          $GPA = 0;

          // استعلام SQL الجديد
          $sql = "SELECT CONCAT('14', LEFT(ar.Semster_Number, 2)) AS academic_year,
        CASE RIGHT(ar.Semster_Number, 1)
            WHEN '0' THEN 'التحضيري'
            WHEN '1' THEN 'الأول'
            WHEN '2' THEN 'الثاني'
            WHEN '3' THEN 'الثالث'
            WHEN '4' THEN 'الرابع'
            WHEN '5' THEN 'الخامس'
            WHEN '6' THEN 'السادس'
            WHEN '7' THEN 'السابع'
            WHEN '8' THEN 'الثامن'
            WHEN '9' THEN 'التاسع'
        END AS semester,
        cs.subject_code AS course_code,
        sub.subject_name AS course_name,
        sub.credit_hours,
        IFNULL(ar.grade, 'لا يوجد درجة') AS grade,
        IFNULL(sg.GPA, 'لا يوجد معدل') AS student_GPA
        FROM 
        current_semester cs
        JOIN 
        subjects sub ON cs.subject_code = sub.subject_code
        LEFT JOIN 
        academic_record ar ON cs.student_id = ar.student_id 
                            AND cs.subject_code = ar.subject_code 
                            AND cs.Semester_Number = ar.Semster_Number
        LEFT JOIN 
        student_gpa sg ON cs.student_id = sg.student_ID 
                        AND cs.Semester_Number = sg.Semster_Number
        WHERE 
        cs.student_id = {$_SESSION['Account_ID']}
        ORDER BY 
        CASE WHEN ar.Semster_Number IS NOT NULL THEN 0 ELSE 1 END,
        cs.Semester_Number ASC";

          $result = $conn->query($sql);

          // التحقق من وجود نتائج
          if ($result->num_rows > 0) {
            // عرض البيانات لكل فصل دراسي
            while ($row = $result->fetch_assoc()) {
              // تحديد متغير لتخزين الفصل الدراسي الحالي
              $semester = $row['semester'];
              // تحقق مما إذا كان الفصل الدراسي تم عرضه بالفعل
              if (!$semester_displayed) {
                // عرض بيانات الفصل الدراسي الجديد
                echo "<h4>الفصل الدراسي: {$row['semester']}</h4>";
                echo "<h4>العام الدراسي: {$row['academic_year']} هـ</h4>";

                // تعيين قيمة للتأكيد على عرض الفصل والعام الدراسي
                $semester_displayed = true;

                // بدء جدول جديد لعرض المقررات
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
                          <th scope='col'>العلامة</th>
                          <th scope='col'>التقدير</th>
                        </tr>
                      </thead>
                      <tbody>";
              }

              // تحويل الدرجات إلى تقدير بحسب الشروط الموجودة في الكود الأصلي
              if (!empty($row['grade']) && is_numeric($row['grade'])) {
                if ($row['grade'] >= 95) {
                  $mark = "A+";
                } else if ($row['grade'] >= 90) {
                  $mark = "A";
                } else if ($row['grade'] >= 85) {
                  $mark = "B+";
                } else if ($row['grade'] >= 80) {
                  $mark = "B";
                } else if ($row['grade'] >= 75) {
                  $mark = "C+";
                } else if ($row['grade'] >= 70) {
                  $mark = "C";
                } else if ($row['grade'] >= 65) {
                  $mark = "D+";
                } else if ($row['grade'] >= 60) {
                  $mark = "D";
                } else {
                  $mark = "F";
                }
              } else {
                $mark = "غير متوفرة";
              }

              // عرض بيانات المقرر في الجدول
              echo "<tr>";
              echo "<td>{$row['course_code']}</td>";
              echo "<td>{$row['course_name']}</td>";
              echo "<td>{$row['credit_hours']}</td>";
              echo "<td>{$row['grade']}</td>";
              echo "<td>$mark</td>";
              echo "</tr>";
              $GPA = $row['student_GPA'];
            }



            // عرض المعدل التراكمي بعد الحلقة
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
<h5>فصلي</h5><br>
<h5>المعدل التراكمي: $GPA</h5>
</div>
</div><br>
</div>



<!-- End Sales Card --><h1><h1>
";


          } else {
            echo "
            <div class='alert alert-danger'>

            <p></p>";          }
          ?>


          <?php
          $current_academic_year = "";
          $current_semester = "";
          $GPA = 0;

          $sql = "SELECT 
                CONCAT('14', LEFT(ar.Semster_Number, 2)) AS academic_year,
                CASE RIGHT(ar.Semster_Number, 1)
                    WHEN '0' THEN 'التحضيري'
                    WHEN '1' THEN 'الأول'
                    WHEN '2' THEN 'الثاني'
                    WHEN '3' THEN 'الثالث'
                    WHEN '4' THEN 'الرابع'
                    WHEN '5' THEN 'الخامس'
                    WHEN '6' THEN 'السادس'
                    WHEN '7' THEN 'السابع'
                    WHEN '8' THEN 'الثامن'
                    WHEN '9' THEN 'التاسع'
                END AS semester,
                ar.subject_code,
                s.subject_name,
                s.credit_hours,
                COALESCE(ar.grade, 'لا يوجد درجة') AS grade,
                COALESCE(sg.GPA, 'لا يوجد معدل') AS gpa
            FROM academic_record ar
            LEFT JOIN subjects s ON ar.subject_code = s.subject_code
            LEFT JOIN  student_gpa sg ON ar.student_ID = sg.student_ID AND ar.Semster_Number = sg.Semster_Number
            WHERE ar.student_ID = {$_SESSION['Account_ID']} AND ar.Semster_Number NOT IN (SELECT Semester_Number FROM current_semester WHERE student_id = {$_SESSION['Account_ID']})
            ORDER BY 
                ar.Semster_Number DESC";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              if ($current_academic_year != $row['academic_year'] || $current_semester != $row['semester']) {
                if ($current_academic_year != "") {
                  echo "</tbody>
                    </table>
                    </div></div></div></div><h1></h1><div class='col-xxl-12 col-md-12'><div class='card info-card sales-card'><div class='card-body'><h5>فصلي</h5><br><h5>المعدل التراكمي: $GPA</h5></div></div><br></div><!-- End Sales Card --><h1><h1>";
                }
                echo "<h4>العام الدراسي: " . $row['academic_year'] . " هـ</h4>";
                echo "<h4>الفصل الدراسي: " . $row['semester'] . "</h4>";
                echo "<div class='col-xxl-12 col-md-12'>
                <div class='card info-card sales-card'>
                <div class='card-body'>
                <div class='table-responsive'>
                <table class='table'>
                <thead><tr>
                <th scope='col'>رمز المقرر</th>
                <th scope='col'>اسم المقرر</th>
                <th scope='col'>الساعات</th>
                <th scope='col'>التقدير</th> 
                <th scope='col'>العلامة</th>                                                              
                </tr></thead><tbody>";
                $current_academic_year = $row['academic_year'];
                $current_semester = $row['semester'];
              }
              if (!empty($row['grade']) && is_numeric($row['grade'])) {
                if ($row['grade'] >= 95) {
                  $mark = "A+";
                } else if ($row['grade'] >= 90) {
                  $mark = "A";
                } else if ($row['grade'] >= 85) {
                  $mark = "B+";
                } else if ($row['grade'] >= 80) {
                  $mark = "B";
                } else if ($row['grade'] >= 75) {
                  $mark = "C+";
                } else if ($row['grade'] >= 70) {
                  $mark = "C";
                } else if ($row['grade'] >= 65) {
                  $mark = "D+";
                } else if ($row['grade'] >= 60) {
                  $mark = "D";
                } else {
                  $mark = "F";
                }
              } else {
                $mark = "غير متوفرة";
              }

              echo "<tr><td>" . $row['subject_code'] . "</td>
                      <td>" . $row['subject_name'] . "</td>
                      <td>" . $row['credit_hours'] . "</td>                      
                      <td>" . $row['grade'] . "</td></tr>
                      <td>$mark</td>";
              $GPA = $row['gpa'];

            }
            echo "</tbody>
        </table></div>
        </div></div>
        </div><h1></h1>
        <div class='col-xxl-12 col-md-12'>
        <div class='card info-card sales-card'>
        <div class='card-body'><h5>فصلي</h5>
        <br><h5>المعدل التراكمي: $GPA</h5></div>
        </div><br></div>
        <!-- End Sales Card -->
        <h1><h1>";
          } else {
            echo "
            <div class='alert alert-danger'>
            تنبيه
            <hr>
            <p>لا توجد نتائج متاحة لعرضها.</p>";
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
<link
  href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
  rel="stylesheet">


<!-- تضمين Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
<!-- تضمين Bootstrap السكريبت -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>





<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->

</html>