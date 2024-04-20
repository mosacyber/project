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
  <style>
    /* تنسيق الجدول */
    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody+tbody {
      border-top: 2px solid #dee2e6;
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
            طلاب المرشد الاكاديمي
          </h3>
        </div>

        <div class="row">


          <!-- Sales Card -->
          <div class="col-xxl-12 col-md-12">
            <div class="card info-card sales-card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">رقم الطالب الجامعي</th>
                        <th scope="col">اسم الطالب</th>
                        <th scope="col">التخصص</th>
                        <th scope="col">المعدل</th> <!-- معدله كل ترم من قاعده البيانات student_gpa -->
                        <th scope="col">المقررات الحالية</th>
                        <th scope="col">السجل الأكاديمي</th>
                      </tr>
                    </thead>
                    <tbody>

            <?php

            if (isset($_SESSION['Account_ID'])) {
              // استعلام SQL لاسترداد بيانات معينة من الجدول
              $sql = "SELECT a.Account_ID,CONCAT(a.First_Name, ' ', a.Last_Name) AS Student_Name,
              p.Program_Name,sg.GPA
              FROM academic_advisor_for_student ad
              JOIN accounts a ON ad.student_id = a.Account_ID
              JOIN students s ON ad.student_id = s.student_id
              JOIN programs p ON s.Program_ID = p.Program_ID
              LEFT JOIN student_gpa sg ON ad.student_id = sg.student_ID AND sg.Semster_Number = 451
              WHERE ad.Academic_Advisor_ID = " . $_SESSION['Account_ID'] . "";

              $result = $conn->query($sql);

              // التحقق من وجود بيانات للعرض
              if ($result->num_rows > 0) {
                // عرض البيانات
                while ($row = $result->fetch_assoc()) {
                  echo '<tr>';
                  echo '<td>' . $row["Account_ID"] . '</td>';
                  echo '<td>' . $row["Student_Name"] . '</td>';
                  echo '<td>' . $row["Program_Name"] . '</td>';
                  echo '<td>' . $row["GPA"] . '</td>';
                  // زر "عرض" لفتح ال Modal
                  echo '<td>';
                  echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal' . $row["Account_ID"] . '">عرض</button>';
                  echo '</td>';
                  echo '<td>';
                  echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal' . $row["Account_ID"] . '">عرض</button>';
                  echo '</td>';
                  // جدول الدراسات
                  echo '<td>';
                  echo '<div class="modal fade" id="detailsModal' . $row["Account_ID"] . '" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel' . $row["Account_ID"] . '" aria-hidden="true">';
                  echo '<div class="modal-dialog" role="document">';
                  echo '<div class="modal-content">';
                  echo '<div class="modal-header">';
                  echo '<h5 class="modal-title" id="detailsModalLabel' . $row["Account_ID"] . '">تفاصيل الصف</h5>';
                  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                  echo '<span aria-hidden="true">&times;</span>';
                  echo '</button>';
                  echo '</div>';
                  echo '<div class="modal-body">';
                  // تفاصيل الصف تظهر هنا
                  echo '<p>الرقم الجامعي : ' . $row["Account_ID"] . '</p>';
                  echo '<p>اسم الطالب : ' . $row["Student_Name"] . '</p>';
                  echo '<br>';
                  // جدول الدراسات
                  $previous_subject = null; // تعريف متغير لتتبع اسم المادة السابقة
                  $A = 0;

                  $sql1 = "SELECT DISTINCT subjects.subject_code, subjects.subject_name, coursework_type.coursework_type_name, coursework.coursework_grade, grades.coursework_mark
                  FROM grades
                  INNER JOIN coursework ON grades.coursework_id = coursework.coursework_id
                  INNER JOIN subjects ON coursework.subject_code = subjects.subject_code
                  INNER JOIN coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
                  WHERE grades.student_id = " . $row["Account_ID"] . " AND coursework.subject_code = grades.subject_code";
                  $SQL2 = mysqli_query($conn, "SELECT COUNT(DISTINCT subjects.subject_name) AS subject_count
                  FROM grades
                  INNER JOIN coursework ON grades.coursework_id = coursework.coursework_id
                  INNER JOIN subjects ON coursework.subject_code = subjects.subject_code
                  INNER JOIN coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
                  WHERE grades.student_id =  " . $row["Account_ID"] . " ");
                  $S = mysqli_fetch_array($SQL2);
                  $count = $S[0]; // قيمة العدد المحسوب
                  $B = 8;
                  $result1 = $conn->query($sql1);

                  if ($result1->num_rows > 0) {
                    $previous_subject = '';

                    while ($row1 = $result1->fetch_assoc()) {
                      if ($row1["subject_name"] != $previous_subject) {
                        $A++;
                        $C = 0;
                        if ($previous_subject != '') {
                          echo '</tbody></table></div></div></div></div><br><br>';
                        }

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
                      }

                      $progress_width = ($row1["coursework_mark"] / $row1["coursework_grade"]) * 100;

                      if ($progress_width > 90) {
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
                        <td>' . $row1["coursework_type_name"] . '</td>
                        <td>' . $row1["coursework_grade"] . '</td>
                        <td>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:' . $progress_width . '%; background-color:' . $progress_color . ';" aria-valuenow="' . $progress_width . '"
                              aria-valuemin="0" aria-valuemax="100">' . $row1["coursework_mark"] . '</div>
                          </div>
                        </td>
                      </tr>';
                      $C++;
                      $previous_subject = $row1["subject_name"];
                      if ($count == $A && $C == $B) {
                        break;
                      }
                    }
                    echo '</tbody></table></div></div></div></div><br><br>';
                  } else {
                    echo '<p>لا يوجد بيانات للعرض</p>';
                  }
                  $sql2 = "SELECT cs.subject_code, s.subject_name
                  FROM current_semester cs
                  LEFT JOIN subjects s ON cs.subject_code = s.subject_code
                  WHERE cs.student_id =" . $row["Account_ID"] . " AND NOT EXISTS (
                  SELECT 1 FROM grades g 
                  WHERE g.student_id = cs.student_id
                  AND g.subject_code = cs.subject_code) ORDER BY cs.subject_code";

                  $result2 = mysqli_query($conn, $sql2);

                  // التحقق من وجود بيانات للعرض
                  if ($result2->num_rows > 0) {
                    // عرض المواد التي لم تحصل على درجات بعد
                    while ($row2 = $result2->fetch_assoc()) {
                      echo '<div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h2>' . $row2["subject_name"] . ' ' . $row2["subject_code"] . '</h2>
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
                  echo '<div class="modal-footer">';
                  echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>';
                  echo '<button type="button" class="btn btn-primary" data-dismiss="modal">تواصل</button>';

                  echo '</div>';

                }
              } else {
                echo '<p>لا يوجد بيانات للعرض</p>';
              }
            } else {
                echo "
            <div class='alert alert-danger'>
                <strong>تنبيه</strong>
                <hr>
                <p>هناك مشكلة في السيشن</p>
            </div>";
              }
            ?>

                      <script>
                        // استدعاء الدالة عند فتح النافذة المنبثقة
                        $('#detailsModal<?php echo $row["Account_ID"]; ?>').on('shown.bs.modal', function () {
                          // استدعاء AJAX لجلب بيانات الجدول
                          $.ajax({
                            success: function (response) {
                              var html = '';
                              $.each(response, function (index, data) {
                                html += '<tr>';
                                html += '<td>ال</td>';
                                html += '<td>لا</td>';
                                html += '<td>لات</td>';
                                html += '</tr>';
                              });
                              $('#subjectTableBody<?php echo $row["Account_ID"]; ?>').html(html);
                            },
                            error: function (xhr, status, error) { // دالة تُنفذ في حال حدوث خطأ
                              // عند حدوث خطأ، يمكنك تنفيذ إجراءات إضافية هنا، مثلاً عرض رسالة خطأ
                              console.error(xhr.responseText);
                            }
                          });
                        });
                      </script>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- End Sales Card -->
          <h1></h1>

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