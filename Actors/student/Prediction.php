<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>الدرجات</title>
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
        <!-- Revenue Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php

        $sql4 = "SELECT * FROM students WHERE student_id = '{$_SESSION['Account_ID']}'";
        $result4 = $conn->query($sql4);
    
    if ($result4->num_rows > 0) {

      
      $row4 = $result4->fetch_assoc();

    $student_id= $row4['student_id'];
    $Program_ID= $row4['Program_ID'];
   

    $sql5 = "SELECT * FROM programs WHERE Program_ID = $Program_ID";
    $result5 = $conn->query($sql5);

    $firstDigit = substr($row4['Program_ID'], 0, 1);

    $startPosition = 1; // الموضع البدئي للرقمين المطلوبين
    $middleDigits = substr($row4['Program_ID'], $startPosition, 2); // يأخذ رقمين ابتداءً من الموضع البدئي
    

    $endDigits = substr($row4['Program_ID'], -2);
    



    $sql6 = "SELECT * FROM colleges WHERE College_ID = $firstDigit";
    $result6 = $conn->query($sql6);
    if ($result6->num_rows > 0) {
        $row6 = $result6->fetch_assoc();


        $College_Name= $row6['College_Name'];
        

    }

    $sql7 = "SELECT * FROM departments WHERE Department_ID = '{$firstDigit}{$middleDigits}'";
    $result7 = $conn->query($sql7);
    if ($result7->num_rows > 0) {
        $row7 = $result7->fetch_assoc();


        $Department_Name= $row7['Department_Name'];
        

    }










    if ($result5->num_rows > 0) {
        $row5 = $result5->fetch_assoc();
    } else {
        // عرض التنبيه في حالة عدم العثور على البرنامج
        echo "
        <div class='alert alert-danger'>
            <p>تنبيه: لا يوجد بيانات برنامج</p>
        </div>";
        // تعيين قيم افتراضية
        $row5 = array('Program_Name' => 'برنامج غير معروف'); 
    }

    if (isset($_SESSION['role'])) {
        // تحديد التخصص والدرجة العلمية استنادًا إلى قيمة $_SESSION['role']
        switch ($_SESSION['role']) {
            case '1':
                $Specialization = "";
                $Degree = "طالب";
                $Major = $row5['Program_Name'];
                break;
            default:
                // تعيين التخصص الافتراضي هنا في حالة عدم تطابق أي من الحالات السابقة
                break;
        }
    }
} else {
    // عرض التنبيه في حالة عدم العثور على الطالب
    echo "
    <div class='alert alert-danger'>
        <p>تنبيه: لا يوجد بيانات طالب</p>
    </div>";
    // تعيين قيم افتراضية
    $row4 = array();
    $row5 = array('Program_Name' => 'برنامج غير معروف');
    $Specialization = "تخصص غير معروف";
    $Degree = "درجة غير معروفة";
    $Major = "تخصص غير معروف";
}




                ?>            



<div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم :</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الجامعي :</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">التخصص :</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Major ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الدرجة العلمية :</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Degree ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">القسم :</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Department_Name ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الكلية :</div>
                    <div class="col-lg-9 col-md-8"><?php echo $College_Name ?></div>
                  </div>



          </div>
        </div><!-- End Revenue Card -->
        </div>
        <br><br>

        <div class="page-header">
          <h3 class="page-title">
          درجات المقررات الحالية
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

                echo '<div class="col-xxl-10 col-md-12">
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
            echo '</tbody></table></div></div></div></div><br><br>
            
            

            

            <div class="col-md-2 grid-margin">
            <div class="card" style="background-color: #1DC51D;">
              <div class="card-body">
                <div style="text-align: center;">
                  <h5 style="color: white; margin-top: 10px;">نتيجتك المتوقعة للمادة</h5>
                  <i class="fas fa-lightbulb" style="font-size: 24px; color: white; position: absolute; top: 10px; left: 10px; cursor: pointer;" onclick="toggleMessage()"></i>

                  <div style="width: 100px; height: 100px; border-radius: 50%; background-color: white; margin: 0 auto;">
                    <h1 style="line-height: 100px; margin: 0;">A+</h1>
                  </div>                  <div id="message" style="display: none; background-color: rgba(255, 255, 255, 0.8); border-radius: 5px; padding: 10px; margin-top: 40px;">
                  <p style="margin: 0;">طف اللمبة</p>
                </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
          function toggleMessage() {
            var message = document.getElementById("message");
            if (message.style.display === "none") {
              message.style.display = "block";
            } else {
              message.style.display = "none";
            }
          }
          </script>
  
          <hr>
            ';
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
              echo '<div class="col-xxl-10 col-md-12">
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
            </div><br><br>      
            
            
            
            <div class="col-md-2 grid-margin">
            <div class="card" style="background-color: #1DC5A9;">
              <div class="card-body">
                <div style="text-align: center;">
                  <h5 style="color: white; margin-top: 10px;">نتيجتك المتوقعة للمادة</h5>
                  <i class="fas fa-lightbulb" style="font-size: 24px; color: white; position: absolute; top: 10px; left: 10px; cursor: pointer;" onclick="toggleMessage()"></i>

                  <div style="width: 100px; height: 100px; border-radius: 50%; background-color: white; margin: 0 auto;">
                    <h1 style="line-height: 100px; margin: 0;">؟</h1>
                  </div>                  <div id="message" style="display: none; background-color: rgba(255, 255, 255, 0.8); border-radius: 5px; padding: 10px; margin-top: 40px;">
                  <p style="margin: 0;">طف اللمبة</p>
                </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
          function toggleMessage() {
            var message = document.getElementById("message");
            if (message.style.display === "none") {
              message.style.display = "block";
            } else {
              message.style.display = "none";
            }
          }
          </script>
          
          
          
          
          
          
          <hr>
          ';
            }
          }
          ?>



          <!-- End Sales Card -->
          <!-- Sales Card -->
          <!-- End Sales Card -->
          <h1></h1>
          <h1></h1>

          <?php

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
$mark = "";
    if( $school_type > 0 && $school_percentage > 0 && $aptitude_test > 0 && $acadmic_achievement > 0 && $programming1 > 0 && $programming2 > 0 && $visual_programming > 0 && $data_structure > 0){
      
      $command = "java -cp \"C:\Program Files\Weka-3-8-6\\weka.jar;D:\Downloads_D\Java\Projects\GraduateProject\build\classes\" course_Predction.year3 $school_percentage $aptitude_test $acadmic_achievement $programming1 $programming2 $data_structure $visual_programming $school_type 2>&1";

      $output = shell_exec($command);

    } elseif ($school_type > 0 && $school_percentage > 0 && $aptitude_test > 0 && $acadmic_achievement > 0 && $programming1 > 0 && $programming2 > 0) {
     
      $command = "java -cp \"C:\Program Files\Weka-3-8-6\\weka.jar;D:\Downloads_D\Java\Projects\GraduateProject\build\classes\" course_Predction2.year2 $school_percentage $aptitude_test $acadmic_achievement $programming1 $programming2 $school_type 2>&1";
    
      $output = shell_exec($command);
 
    } else {

      $output=-2;

    }

    

    if ($output == 1 || $output == 0) {
      $mark = "A+";
    } else if ($output == 2) {
      $mark = "A";
    } else if ($output == 3) {
      $mark = "B+";
    } else if ($output == 4) {
      $mark = "B";
    } else if ($output == 5) {
      $mark = "C+";
    } else if ($output == 6) {
      $mark = "C";
    } else if ($output == 7) {
      $mark = "D+";
    } else if ($output == 8) {
      $mark = "D";
    } else if ($output == -2) {
      $mark = "التنبؤ غير متوفر لحد مايتم اجتياز مادة برمجة 1 وبرمجة 2 على الاقل.";
    }else {
      $mark = "F";
    }
     
    
            ?>
         
          <div class="col-xxl-12 col-md-12">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h2>التقدير المتوقع الحصول عليه عند التخرج:</h2>
                <hr>
                <br>
                <?php 
                
                echo "
                <h5>
                $mark
                </h5>
     
                ";  
                ?>
               
              </div>
            </div>
          </div>
          
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