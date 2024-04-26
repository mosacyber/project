<?php session_start(); ?>
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
            النتائج
            المتوقعه من التنبؤ
          </h3>
        </div>

        <div class="row">
          <!-- Sales Card -->
          <?php
          $host = "localhost";
          $name = "root";
          $pass = "";
          $DB = "university_info";
          $con = @mysqli_connect($host, $name, $pass, $DB) or die(mysqli_connect_error());
          $previous_subject = null; // تعريف متغير لتتبع اسم المادة السابقة
          $A = 0;

          $sql = "SELECT DISTINCT subjects.subject_code, subjects.subject_name, coursework_type.coursework_type_name, coursework.coursework_grade, grades.coursework_mark
          FROM grades
          INNER JOIN coursework ON grades.coursework_id = coursework.coursework_id
          INNER JOIN subjects ON coursework.subject_code = subjects.subject_code
          INNER JOIN coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
          WHERE grades.student_id = " . $_SESSION['Account_ID'] . " AND coursework.subject_code = grades.subject_code ORDER by  subjects.subject_code";
          $SQL2 = mysqli_query($con, "SELECT COUNT(DISTINCT subjects.subject_name) AS subject_count
          FROM grades
          INNER JOIN coursework ON grades.coursework_id = coursework.coursework_id
          INNER JOIN subjects ON coursework.subject_code = subjects.subject_code
          INNER JOIN coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
          WHERE grades.student_id = " . $_SESSION['Account_ID'] . "");
          $S = mysqli_fetch_array($SQL2);
          $count = $S[0];
          $B = 8;
          $C = 0;
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
            $previous_subject = '';

            while ($row = $result->fetch_assoc()) {
              if ($row["subject_name"] != $previous_subject) {
                $A++;
                $C = 0;
                if ($previous_subject != '') {
                  echo '</tbody></table></div></div></div></div><br><br>';
                }

                echo '<div class="col-xxl-12 col-md-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h2>' . $row["subject_name"] . ' ' . $row["subject_code"] . '</h2>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">نوع النشاط الدراسي</th>
                          <th scope="col">درجة النشاط الدراسي</th>
                          <th scope="col">درجة الطالب</th>
                        </tr>
                      </thead>
                      <tbody>';

              }

              $progress_width = ($row["coursework_mark"] / $row["coursework_grade"]) * 100;

              if ($progress_width >= 90) {
                $progress_color = "#6fe381";
              } elseif ($progress_width >= 80 && $progress_width <= 89) {
                $progress_color = "#d3ef5e";
              } elseif ($progress_width >= 70 && $progress_width <= 79) {
                $progress_color = "#fee43f";
              } elseif ($progress_width >= 60 && $progress_width <= 69) {
                $progress_color = "#f19c26";
              } else {
                $progress_color = "#ed4c36";
              }

              echo '<tr>
                      <td>' . $row["coursework_type_name"] . '</td>
                      <td>' . $row["coursework_grade"] . '</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" style="width:' . $progress_width . '%; background-color:' . $progress_color . ';" aria-valuenow="' . $progress_width . '"
                            aria-valuemin="0" aria-valuemax="100">' . $row["coursework_mark"] . '</div>
                        </div>
                      </td>
                    </tr>';
              $C++;
              $previous_subject = $row["subject_name"];
              if ($count == $A && $C == $B) {
                break;
              }
            }
            echo '</tbody></table></div></div></div></div><br><br>';
          } ?>

          <?php
          $sql1 = "SELECT cs.subject_code, s.subject_name
        FROM current_semester cs
        LEFT JOIN subjects s ON cs.subject_code = s.subject_code
        WHERE cs.student_id = " . $_SESSION['Account_ID'] . " AND NOT EXISTS (
            SELECT 1 FROM grades g 
            WHERE g.student_id = cs.student_id
            AND g.subject_code = cs.subject_code
        ) ORDER BY cs.subject_code";

          $result1 = mysqli_query($con, $sql1);

          if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
              echo '<div class="col-xxl-12 col-md-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h2>' . $row1["subject_name"] . ' ' . $row1["subject_code"] . '</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">نوع النشاط الدراسي</th>
                                        <th scope="col">درجة النشاط الدراسي</th>
                                        <th scope="col">درجة الطالب</th>
                                    </tr>
                                </thead>
                                <tbody>';
              echo '</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><br><br>';
            }
          }
          ?>



          <!-- End Sales Card -->
          <!-- Sales Card -->
          <!-- End Sales Card -->
          <h1></h1>
          <h1></h1>

          <!-- Sales Card -->
          <div class="col-xxl-12 col-md-12">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h2>التنبؤ بالتخرج</h2>
                <hr>
                <h5>
                  التقدير المتوقع الحصول عليه </h5><br>
                <h5>
                  B+
                </h5>
                <h5>
                  اللون
                </h5>
                <!-- دائره بداخلها الدرجه b+ والدائره فيها اللون -->
                <!--



 من
 student_gpa
 
  Semster_Number 

مثلا 
451
الفصل الاول 
452 الثاني
-->
              </div>
            </div>
          </div>
          <!-- End Sales Card -->


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