<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>الطلاب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
    <!-- تضمين CSS -->
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
        <!-- Revenue Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php
if (isset($_SESSION['role'])) {
// استعلام SQL لاسترداد البيانات من جدول faculty_member
$sql = "SELECT * FROM faculty_member WHERE Faculty_member_ID = $_SESSION[Account_ID]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $sql2 = "SELECT * FROM departments WHERE Department_ID =  $row[Department_ID]";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();

        $firstDigit = substr($row['Department_ID'], 0, 1);

        $sql3 = "SELECT * FROM colleges WHERE College_ID =  $firstDigit";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_assoc();

            $sql4 = "SELECT * FROM students WHERE student_id = '{$_SESSION['Account_ID']}'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                // بيانات الطالب موجودة ويمكن معالجتها هنا
            } else {

            }
        } else {
            echo "لا يوجد بيانات كلية";
        }
    } else {
        echo "
        <div class='alert alert-danger'>
        تنبيه
        <hr>
            <p>لا يوجد بيانات قسم</p>
    </div>";
    }
} else {
  echo "
    <div class='alert alert-danger'>
    تنبيه
    <hr>
        <p>لا يوجد بيانات عضو هيئة تدريس</p>
</div>";
}

    
    
    // تحديد التخصص والدرجة العلمية استنادًا إلى قيمة $_SESSION['role']
    switch ($_SESSION['role']) {
        case '1':
            $Specialization = "";
            $Degree = "طالب";


            $Major = $row4['Program_ID']; 

            break;
        case '2':
            $Specialization = "عميد الكلية";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            
            break;
        case '3':
            $Specialization = "منسق البرنامج";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            
            break;
        case '4':
            $Specialization = "المرشد الاكاديمي";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case '8':
            $Specialization = "عضو هيئة التدريس";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case '6':
            $Specialization = "وكيل شؤون الطلاب التعليمية";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case '7':
            $Specialization = "مدير الجامعة";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case 'admin':
            // تعيين التخصص لحالة الادمن هنا
            break;
        default:
            // تعيين التخصص الافتراضي هنا في حالة عدم تطابق أي من الحالات السابقة
            break;
    }
}
?>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الوظيفي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>


<div class="row">
    <div class="col-lg-3 col-md-4 label">التخصص</div>
    <div class="col-lg-9 col-md-8"><?php echo  $Major  ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">الدرجه العلميه</div>
    <div class="col-lg-9 col-md-8"><?php echo $Degree ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">القسم</div>
    <div class="col-lg-9 col-md-8"><?php echo $departments ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">الكليه</div>
    <div class="col-lg-9 col-md-8"><?php echo $college ?></div>
</div>


          </div>
       
       
       
       


        </div>
        </div>
        </div>
        <!-- content-wrapper ends -->
        </div>
        <br>
        <br>

        <div class="page-header">
          <h3 class="page-title">الطلاب المشرف عليهم كمرشد أكاديمي         </h3>
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
                            // داخل الحلقة التي تعرض بيانات الطالب
                            $student_id = $row["Account_ID"];
                            $student_name = $row["Student_Name"];
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal' . $row["Account_ID"] . '">عرض</button>';
                            echo '</td>';
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary view" data-toggle="modal" data-target="#acadimicrecord" data-student-id="' . $student_id . '" data-student-name="' . $student_name . '">عرض</button>';
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
                            $previous_subject = null;
                            $A = 0;

                            $sql1 = "SELECT DISTINCT subjects.subject_code, subjects.subject_name, coursework_type.coursework_type_name, coursework.coursework_grade, grades.coursework_mark
                  FROM grades
                  INNER JOIN coursework ON grades.coursework_id = coursework.coursework_id
                  INNER JOIN subjects ON coursework.subject_code = subjects.subject_code
                  INNER JOIN coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
                  WHERE grades.student_id = " . $row["Account_ID"] . " AND coursework.subject_code = grades.subject_code  ORDER by  subjects.subject_code";
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
                          echo "
                <div class='alert alert-danger'>
                تنبيه
                <hr>
                <p>لا يوجد بيانات للعرض</p>
            </div>";
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
          <script src="jquery.min.js"></script>
          <script>
            $(document).ready(function () {
              $('body').on('click', '.view', function () {
                var row = $(this).closest('tr');
        var studentId = row.find('td:eq(0)').text();
        var studentName = row.find('td:eq(1)').text();
        
        $.ajax({
            type: "POST",
            url: "view_grade_student.php", 
            data: { student_id: studentId,
                    studentName:studentName
            }, 
            success: function(response) {
              $('#acadimicrecord').html(response);
            }
        });
              });
            });
          </script>
          <div class="modal fade" id="acadimicrecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">السجل الأكاديمي</h5>
                  <button type="button" class="close-left btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                  <button type="button" class="btn btn-primary">تواصل</button>
                </div>
              </div>
            </div>
          </div>
          <script>

            $('#acadimicrecord').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var student_id = button.data('student-id');
              var student_name = button.data('student-name');

              $(this).find('.student-name').text(student_name);
              $(this).find('.student-id').text(student_id);
            });

          </script>
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
