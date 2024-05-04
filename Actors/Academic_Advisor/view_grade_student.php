<?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
          include $path;
            break;
        }
    }


        $studentId = $_POST['student_id'];
        $studentName = $_POST['studentName'];

?>
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">السجل الأكاديمي</h5>
                  <button type="button" class="close-left btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h6>اسم الطالب: <?php echo $studentName; ?></h6>
                  <h6>رقم الطالب: <?php echo $studentId; ?></h6>
                  
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
                          IFNULL(ar.grade, 'لا يوجد علامة') AS grade,
                          IFNULL(sg.GPA, 'غير متوفر') AS student_GPA
                          FROM current_semester cs
                          JOIN subjects sub ON cs.subject_code = sub.subject_code
                          LEFT JOIN academic_record ar ON cs.student_id = ar.student_id AND cs.subject_code = ar.subject_code AND cs.Semester_Number = ar.Semster_Number
                          LEFT JOIN student_gpa sg ON cs.student_id = sg.student_ID AND cs.Semester_Number = sg.Semster_Number
                          WHERE cs.student_id = '$studentId'
                          AND cs.Semester_Number = (SELECT MAX(Semester_Number)  FROM current_semester WHERE student_id = '$studentId'  )";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $semester = $row['semester'];
                      if (!$semester_displayed) {
                        echo "<h5>العام الدراسي: {$row['academic_year']} هـ</h5>";
                        echo "<h5>الفصل الدراسي: {$row['semester']}</h5>";
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
                            <h5>المعدل الفصلي: $smesterGb </h5>
                            <h5>المعدل التراكمي: $GPA</h5></div></div><br></div><h1><h1>";
                  } else {
                    echo "<div class='alert alert-danger'><p></p>";
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
                          COALESCE(ar.grade, 'لا يوجد علامة') AS grade,
                          COALESCE(sg.GPA, 'غير متوفر') AS gpa
                      FROM 
                          academic_record ar
                      LEFT JOIN 
                          subjects s ON ar.subject_code = s.subject_code
                      LEFT JOIN 
                          student_gpa sg ON ar.student_ID = sg.student_ID AND ar.Semster_Number = sg.Semster_Number 
                      WHERE 
                          ar.student_ID = '$studentId'
                          AND ar.Semster_Number NOT IN (SELECT Semester_Number FROM current_semester WHERE student_id = '$studentId' ORDER BY ar.Semster_Number DESC)";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      if ($current_academic_year != $row['academic_year'] || $current_semester != $row['semester']) {
                        if ($current_academic_year != "") {
                          echo "</tbody>
                    </table>
                    </div></div></div></div><h1></h1><div class='col-xxl-12 col-md-12'><div class='card info-card sales-card'><div class='card-body'><h5>المعدل الفصلي: </h5><br><h5>المعدل التراكمي: $GPA</h5></div></div><br></div><!-- End Sales Card --><h1><h1>";
                        }
                        echo "<h5>العام الدراسي: " . $row['academic_year'] . " هـ</h5>";
                        echo "<h5>الفصل الدراسي: " . $row['semester'] . "</h5>";
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
                          <h5>المعدل التراكمي: $GPA</h5></div>
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