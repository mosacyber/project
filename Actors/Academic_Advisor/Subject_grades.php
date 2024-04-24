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
          <style>
            #grades-table {
              display: none;
            }
          </style>

          <div class="row">
            <?php
            $coursework_ids = array();
            $subjectCode = '';
            $sql = "SELECT DISTINCT CONCAT(s.subject_code, ' - ', s.subject_name) AS subject_code_and_name, s.subject_code
            FROM current_semester cs
            JOIN subjects s ON cs.subject_code = s.subject_code
            WHERE cs.Faculty_member_ID = {$_SESSION['Account_ID']} AND cs.Semester_Number = 452";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $subjectBoxId = 'subjectBox_' . $row['subject_code'];
                echo "<div class='col-xxl-4 col-md-6 mb-4'>";
                echo "<div class='card info-card sales-card'>";
                echo "<div class='card-body'>";
                echo "<div class='d-flex align-items-center'>";
                echo "<div class='card-icon rounded-circle d-flex align-items-center justify-content-center'></div>";
                echo "<button class='btn btn-primary subject-button' style='font-size: 20px; text-align: center; margin: auto;' id='$subjectBoxId'>" . $row['subject_code_and_name'] . "</button>";
                echo "</div></div></div>";
                echo "</div>";

                echo "<script>";
                echo "document.getElementById('$subjectBoxId').addEventListener('click', function() {";
                echo "var subjectCode = '" . $row['subject_code'] . "';";
                echo "document.getElementById('grades-table').style.display = 'block';";
                echo "document.getElementById('subject-heading').innerText = '" . $row['subject_code_and_name'] . "';";
                echo "updateTable(subjectCode);";
                echo "});";
                echo "</script>";

              }
            } else {
              echo "0 results";
            }
            ?>
          </div>

          <?php
          echo "</div>
    
                <div class='col-xxl-12 col-md-12'>
                <div id='grades-table' class='card info-card sales-card'>
                    <div class='card-body'>
                    <div id='subject-heading' style='text-align: center; margin-bottom: 20px; font-size: 24px;'></div>
                    <button class='btn btn-success mb-3' id='add-data-btn' data-toggle='modal' data-target='#insertModal' >
                    <i class='bi bi-plus-circle'>اضافة علامات الطلاب</i> 
                </button>
                    <div class='table-responsive'>
                        <table class='table'>
                          <thead>
                            <tr>
                              <th scope='col'>الرقم الجامعي</th>
                              <th scope='col'>اسم الطالب</th>";
          $sql1 = "SELECT coursework_id
                        FROM coursework
                        WHERE subject_code = '$subjectCode'";

          $result1 = $conn->query($sql1);

          // تحقق من نتائج الاستعلام
          if ($result1->num_rows > 0) {
            $coursework_ids = array();
            while ($row1 = $result1->fetch_assoc()) {
              $coursework_ids[] = $row1['coursework_id'];
            }

            $sql2 = "SELECT ct.coursework_type_name, cw.coursework_grade 
                             FROM coursework cw
                             JOIN coursework_type ct ON cw.coursework_type_ID = ct.coursework_type_id
                             WHERE cw.coursework_id IN (" . implode(",", $coursework_ids) . ")
                             AND cw.subject_code = '$subjectCode'";

            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
              $columns_data = array();
              while ($row2 = $result2->fetch_assoc()) {
                $columns_data[$row2['coursework_type_name']] = $row2['coursework_grade'];
              }

              foreach ($columns_data as $column_name => $grade) {
                echo "<th scope='col'>$column_name / $grade</th>";
                $sum_deg = array_sum($columns_data);
              }
              echo "<th scope='col'>المجموع / $sum_deg</th>
              <th></th>
              <th></th>
              </tr></thead><tbody>";

            } else {
              echo "0 results";
            }
          }
          $sql_students_grades = "SELECT 
                cs.student_id, 
                CONCAT(ac.First_Name, ' ', ac.Last_Name) AS student_name, ";
          foreach ($coursework_ids as $coursework_id) {
            $sql_students_grades .= "MAX(CASE WHEN coursework.coursework_id = $coursework_id THEN grades.coursework_Mark ELSE 0 END) AS \"$coursework_id\", ";
          }
          ;
          $sql_students_grades .= "cs.Semester_Number
                FROM current_semester cs
                JOIN grades ON cs.student_id = grades.student_ID
                JOIN coursework ON grades.coursework_id = coursework.coursework_id
                JOIN accounts ac ON cs.student_id = ac.Account_ID
                WHERE cs.subject_code = '$subjectCode' 
                AND cs.Faculty_member_ID = {$_SESSION['Account_ID']} 
                AND cs.Semester_Number = 452
                GROUP BY cs.student_id, ac.First_Name, ac.Last_Name";
          $result_students_grades = $conn->query($sql_students_grades);

          if ($result_students_grades->num_rows > 0) {
            while ($row_students_grades = $result_students_grades->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row_students_grades['student_id'] . "</td>";
              echo "<td>" . $row_students_grades['student_name'] . "</td>";
              foreach ($coursework_ids as $coursework_id) {
                echo "<td>" . $row_students_grades[$coursework_id] . "</td>";
              }
              echo "<td>
                <button class='btn btn-warning' data-toggle='modal' data-target='#editModal'>تعديل</button>
                <button class='btn btn-danger'>حذف</button></td>";

              echo "</tr>";
            }

            echo "</tbody>";
          } else {
            echo "<tr><td colspan='3'>لا يوجد درجات تم رصدها سابقًا.</td></tr>";
          }

          ?>


          </table>
        </div>
        <button id='close-table-btn' class='btn btn-danger'>إغلاق الجدول</button>
        <style>
          #close-table-btn {
            display: block;
            margin: auto;
            margin-top: 20px;
            width: fit-content;
            font-size: 1.2rem;
            transform: translateX(-50%);
            left: 50%;
            padding: 10px 20px;
          }
        </style>
      </div>

      <?php
      echo "
  <script>
  document.getElementById('close-table-btn').addEventListener('click', function() {
      document.getElementById('grades-table').style.display = 'none';
  });
  </script>
  ";
      ?>
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

    <!-- واجهة الأضافة -->
  <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabel">Insert</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="popup-form" id="popupForm">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="DName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="DName" />
                </div>
                <div class="mb-3">
                  <label for="AName" class="form-label">Name</label><br>
                  <select class="form-select" id="AName">
                    <option value="">Enter Name name</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="BName" class="form-label">Name</label><br>
                  <select class="form-select" id="BName">
                    <option value="">Enter Name name</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="CName" class="form-label">Name</label><br>
                  <select class="form-select" id="CName">
                    <option value="">User Name</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Note</label>
                  <textarea class="form-control" id="descriptiond" rows="3"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="Txtt" class="form-label">name</label>
                  <input type="text" class="form-control" id="Txtt" />
                </div>
                <div class="mb-3">
                  <label for="Txt" class="form-label">Name</label>
                  <input type="Text" class="form-control" id="Txt" />
                </div>
                <div class="input-group mt-3">
                  <span class="input-group-text">grade</span>
                  <input type="text" class="form-control" id="durationd" readonly />
                </div>
              </div>
            </div>
            <br /> <br />
            <button class="btn btn-primary" id="sbtn">Insert</button>
            <button class="btn btn-secondary" id="closeForm">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- واجهة التعديل -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="popup-form" id="popupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="DName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="DName" />
                            </div>
                            <div class="mb-3">
                                <label for="AName" class="form-label">Name</label><br>
                                <select class="form-select" id="AName">
                                    <option value="">Enter Name name</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="BName" class="form-label">Name</label><br>
                                <select class="form-select" id="BName">
                                    <option value="">Enter Name name</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="CName" class="form-label">Name</label><br>
                                <select class="form-select" id="CName">
                                    <option value="">User Name</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Note</label>
                                <textarea class="form-control" id="descriptiond" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Txtt" class="form-label">name</label>
                                <input type="text" class="form-control" id="Txtt"/>
                            </div>
                            <div class="mb-3">
                                <label for="Txt" class="form-label">Name</label>
                                <input type="Text" class="form-control" id="Txt"/>
                            </div>
                            <div class="input-group mt-3">
                                <span class="input-group-text">grade</span>
                                <input type="text" class="form-control" id="durationd" readonly />
                            </div>
                        </div>
                    </div>
                    <br /> <br />
                    <button class="btn btn-primary" id="sbtn">Insert</button>
                    <button class="btn btn-secondary" id="closeForm">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>


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