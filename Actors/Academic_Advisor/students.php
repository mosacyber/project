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
                            // داخل الحلقة التي تعرض بيانات الطالب
                            $student_id = $row["Account_ID"];
                            $student_name = $row["Student_Name"];
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal' . $row["Account_ID"] . '">عرض</button>';
                            echo '</td>';
                            echo '<td>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acadimicrecord" data-student-id="' . $student_id . '" data-student-name="' . $student_name . '">عرض</button>';
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


          <div class="modal fade" id="acadimicrecord" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">السجل الأكاديمي</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5>اسم الطالب: <span class="student-name"></span></h5>
                  <h5>رقم الطالب: <span class="student-id"></span></h5>
                  <?php
                  $semester_displayed = false;
                  $GPA = 0;
                  $smesterGb = 0;
                  $sql = "SELECT 
          CONCAT('14', LEFT(cs.Semester_Number, 2)) AS academic_year,
          CASE RIGHT(cs.Semester_Number, 1)
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
          IFNULL(sg.GPA, 'غير متوفر') AS student_GPA
          FROM current_semester cs
          JOIN subjects sub ON cs.subject_code = sub.subject_code
          LEFT JOIN academic_record ar ON cs.student_id = ar.student_id AND cs.subject_code = ar.subject_code AND cs.Semester_Number = ar.Semster_Number
          LEFT JOIN student_gpa sg ON cs.student_id = sg.student_ID AND cs.Semester_Number = sg.Semster_Number
          WHERE cs.student_id = 381003233
          AND cs.Semester_Number = (SELECT MAX(Semester_Number)  FROM current_semester WHERE student_id = 381003233  )";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $semester = $row['semester'];
                      if (!$semester_displayed) {
                        echo "<h4>العام الدراسي: {$row['academic_year']} هـ</h4>";
                        echo "<h4>الفصل الدراسي: {$row['semester']}</h4>";
                        $semester_displayed = true;

                        echo "<div class='col-xxl-12 col-md-12'>
                <div class='card info-card sales-card'>
                <div class='card-body'>
                <div class='table-responsive'>
                <table class='table'><thead>
                <tr>
                  <th scope='col'>رمز المقرر</th>
                  <th scope='col'>اسم المقرر</th>
                  <th scope='col'>الساعات</th>                          
                  <th scope='col'>العلامة</th>
                  <th scope='col'>التقدير</th>
                </tr></thead><tbody>";
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
                        $mark = "غير متوفر";
                      }
                      echo "<tr>";
                      echo "<td>{$row['course_code']}</td>";
                      echo "<td>{$row['course_name']}</td>";
                      echo "<td>{$row['credit_hours']}</td>";
                      echo "<td>{$row['grade']}</td>";
                      echo "<td>$mark</td>";
                      echo "</tr>";
                      $GPA = $row['student_GPA'];
                      $subject_grade_hours[] = array(
                        'grade' => $row['grade'],
                        'credit_hours' => $row['credit_hours']
                      );
                    }
                    $smesterGb = calculateGPA($subject_grade_hours);
                    echo "</tbody></table></div></div></div></div><h1></h1>
                  <div class='col-xxl-12 col-md-12'>
                  <div class='card info-card sales-card'>
                  <div class='card-body'>
                  <h5>المعدل الفصلي: $smesterGb </h5><br>
                  <h5>المعدل التراكمي: $GPA</h5></div></div><br></div><h1><h1>";
                  } else {
                    echo "
            <div class='alert alert-danger'><p></p>";
                  }
                  ?>

                  <?php
                  function calculateGPA($data)
                  {
                    $total_points = 0;
                    $total_hours = 0;

                    foreach ($data as $course) {
                      $grade = $course['grade'];
                      $hours = $course['credit_hours'];

                      // تحويل الدرجة إلى نقاط
                      if (!empty($grade) && is_numeric($grade)) {
                        if ($grade >= 95) {
                          $points = 5.0;
                        } elseif ($grade >= 90) {
                          $points = 4.75;
                        } elseif ($grade >= 85) {
                          $points = 4.5;
                        } elseif ($grade >= 80) {
                          $points = 4.0;
                        } elseif ($grade >= 75) {
                          $points = 3.5;
                        } elseif ($grade >= 70) {
                          $points = 3.0;
                        } elseif ($grade >= 65) {
                          $points = 2.5;
                        } elseif ($grade >= 60) {
                          $points = 2.0;
                        } else {
                          $points = 1.0;
                        }

                        $total_points += $points * $hours;
                        $total_hours += $hours;
                      }
                    }
                    if ($total_hours > 0) {
                      $GPA = $total_points / $total_hours;
                      return round($GPA, 2);
                    } else {
                      return "غير متوفر";
                    }
                  }
                  $current_academic_year = "";
                  $current_semester = "";
                  $GPA = 0;
                  $smester_GPA = 0;
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
          COALESCE(sg.GPA, 'غير متوفر') AS gpa
      FROM 
          academic_record ar
      LEFT JOIN 
          subjects s ON ar.subject_code = s.subject_code
      LEFT JOIN 
          student_gpa sg ON ar.student_ID = sg.student_ID AND ar.Semster_Number = sg.Semster_Number 
      WHERE 
          ar.student_ID = 381003233
          AND ar.Semster_Number NOT IN (SELECT Semester_Number FROM current_semester WHERE student_id = 381003233 ORDER BY ar.Semster_Number DESC)";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      if ($current_academic_year != $row['academic_year'] || $current_semester != $row['semester']) {
                        if ($current_academic_year != "") {
                          echo "</tbody>
                    </table>
                    </div></div></div></div><h1></h1><div class='col-xxl-12 col-md-12'><div class='card info-card sales-card'><div class='card-body'><h5>المعدل الفصلي: </h5><br><h5>المعدل التراكمي: $GPA</h5></div></div><br></div><!-- End Sales Card --><h1><h1>";
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
                <th scope='col'>العلامة</th>                                                              
                <th scope='col'>التقدير</th>                                                              
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
                        $mark = "غير متوفر";
                      }

                      echo "<tr><td>" . $row['subject_code'] . "</td>
                      <td>" . $row['subject_name'] . "</td>
                      <td>" . $row['credit_hours'] . "</td>                      
                      <td>" . $row['grade'] . "</td>
                      <td>$mark</td></tr>";
                      $subject_grade_hours[] = array(
                        'grade' => $row['grade'],
                        'credit_hours' => $row['credit_hours']
                      );
                      $GPA = $row['gpa'];

                    }
                    $smester_GPA = calculateGPA($subject_grade_hours);
                    echo "</tbody></table></div></div></div>
                </div><h1></h1>
                <div class='col-xxl-12 col-md-12'>
                <div class='card info-card sales-card'>
                <div class='card-body'><h5>المعدل الفصلي: $smester_GPA</h5>
                <br><h5>المعدل التراكمي: $GPA</h5></div>
                </div><br></div>
                <!-- End Sales Card -->
                <h1><h1>";
                  } else {
                    echo "
            <div class='alert alert-danger'>تنبيه<hr><p>لا توجد نتائج متاحة لعرضها.</p>";
                  }
                  ?>

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