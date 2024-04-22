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
          <h3 class="page-title">المواد الخاصة بالمرشد الأكاديمي</h3>
        </div>

        <div class="row">

          <div class="page-header">


          </div>
          <div class="row">
            <?php
            $sql = "SELECT CONCAT(s.subject_code, ' - ', s.subject_name) AS subject_code_and_name
            FROM current_semester cs
            JOIN subjects s ON cs.subject_code = s.subject_code
            WHERE cs.Faculty_member_ID = {$_SESSION['Account_ID']} AND cs.Semester_Number = 452";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<div class='col-xxl-4 col-md-6 mb-4'>";
                echo "<div class='card info-card sales-card'>";
                echo "<div class='card-body'><h5 class='card-title'></h5>";
                echo "<div class='d-flex align-items-center'>";
                echo "<div class='card-icon rounded-circle d-flex align-items-center justify-content-center'></div>";
                echo "<div class='ps-3'><div class='subject-box' style='font-size: 25px; text-align: center;'>" . $row['subject_code_and_name'] . "</div></div>";
                echo "</div></div></div>";
                echo "</div>";
              }
            } else {
              echo "0 results";
            }
            ?>
          </div>


          <div class="col-xxl-12 col-md-12">
            <div class="card info-card sales-card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">الرقم الجامعي</th>
                        <th scope="col">اسم الطالب</th>
                        <?php
                        // متبقي تخزين كود المقرر عند النقر على مربع المقرر لكي يتم جلب بيانات المقرر المحدد
                        $sql1 = "SELECT cw.coursework_type_ID FROM current_semester cs
                                JOIN coursework cw ON cs.subject_code = cw.subject_code
                                WHERE cs.Faculty_member_ID =  {$_SESSION['Account_ID']} 
                                GROUP by cw.coursework_type_ID";

                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                          //  مصفوفة لتخزين أرقام الاعمال
                          $coursework_ids = array();
                          while ($row1 = $result1->fetch_assoc()) {
                            $coursework_ids[] = $row1['coursework_type_ID'];
                          }
                          if (empty($coursework_ids)) {
                            die("No coursework IDs found!");
                          }
                          // إنشاء استعلام SQL لاستعادة اسم العمل ودرجته من جدول coursework و coursework_type
                          $sql2 = "SELECT ct.coursework_type_name, cw.coursework_grade 
                          FROM coursework cw
                          JOIN coursework_type ct ON cw.coursework_type_ID = ct.coursework_type_id
                          WHERE cw.coursework_id IN (" . implode(",", $coursework_ids) . ")
                          AND cw.subject_code = 'CIT203'";
                          // متبقي تخزين كود المقرر عند النقر على مربع المقرر لكي يتم جلب بيانات المقرر المحدد
                        
                          $result2 = $conn->query($sql2);
                          if ($result2->num_rows != count($coursework_ids)) {
                            die("Mismatch between coursework IDs and data returned from database!");
                          }
                          if ($result2->num_rows > 0) {
                            // مصفوفة لتخزين أسماء الأعمدة ودرجاتها
                            $columns_data = array();
                            while ($row2 = $result2->fetch_assoc()) {
                              // إضافة اسم العمل ودرجته إلى المصفوفة
                              $columns_data[$row2['coursework_type_name']] = $row2['coursework_grade'];
                            }

                            foreach ($columns_data as $column_name => $grade) {
                              echo "<th scope='col'>$column_name / $grade</th>";
                              $sum_deg = array_sum($columns_data);
                            }
                            echo "<th scope='col'>المجموع / $sum_deg</th></tr></thead><tbody>";

                          } else {
                            echo "0 results";
                          }
                        } else {
                          echo "0 results";
                        }
                        $sql3 = "SELECT cs.student_id, CONCAT(ac.First_Name, ' ', ac.Last_Name) AS student_name, ";
                        foreach ($coursework_ids as $coursework_id) {
                          $sql3 .= "MAX(CASE WHEN coursework.coursework_id = $coursework_id THEN grades.coursework_Mark ELSE 0 END) AS \"$coursework_id\", ";
                        }
                        $sql3 .= "cs.Semester_Number
                                  FROM 
                                  current_semester cs
                                  JOIN 
                                  grades ON cs.student_id = grades.student_ID
                                  JOIN 
                                  coursework ON grades.coursework_id = coursework.coursework_id
                                  JOIN 
                                  coursework_type ct ON coursework.coursework_type_ID = ct.coursework_type_id
                                  JOIN 
                                  accounts ac ON cs.student_id = ac.Account_ID
                                  WHERE 
                                  cs.subject_code = 'CIT203' 
                                  AND cs.Faculty_member_ID = 123456 
                                  AND cs.Semester_Number = 452
                                  GROUP BY 
                                  cs.student_id, ac.First_Name, ac.Last_Name";

                        $result3 = $conn->query($sql3);

                        if (!$result3) {
                          die("Error in SQL query: " . $conn->error);
                        }
                        if ($result3->num_rows > 0) {
                          while ($row3 = $result3->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row3['student_id'] . "</td>";
                            echo "<td>" . $row3['student_name'] . "</td>";
                            foreach ($coursework_ids as $coursework_id) {
                              echo "<td>" . $row3[$coursework_id] . "</td>";
                            }
                            echo "</tr>";
                          }

                          echo "</tbody>";
                        } else {
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