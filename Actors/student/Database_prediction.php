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


    body > div.container-scroller > div > div > div > div > div > div.row > div.col-12 > div > div{

      background-image: radial-gradient(at 72% 48%, hsl(249deg 38.46% 30.59% / 0%) 0px, transparent 50%), radial-gradient(at 32% 44%, hsl(249deg 38.46% 30.59% / 0%) 0px, transparent 50%), radial-gradient(at 100% 100%, hsl(351.21deg 100% 45.49% / 0%) 0px, transparent 50%), radial-gradient(at 2% 96%, hsl(169.68deg 66.24% 46.47% / 0%) 0px, #00000000 50%), radial-gradient(at 52% 100%, hsl(351.21deg 4.46% 16.69% / 0%) 0px, #85819754 50%);
    color: #39306c;
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
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الجامعي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">التخصص</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Major ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الدرجه العلميه</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Degree ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">القسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Department_Name ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الكليه</div>
                    <div class="col-lg-9 col-md-8"><?php echo $College_Name ?></div>
                  </div>



          </div>
        </div><!-- End Revenue Card -->
        </div>
        <br>

        <div class="page-header">
          <h3 class="page-title">
التنبؤ بمقرر
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

          $sql = "SELECT DISTINCT 
          subjects.subject_code, 
          subjects.subject_name, 
          coursework_type.coursework_type_name, 
          coursework.coursework_grade, 
          grades.coursework_mark
      FROM 
          grades
      INNER JOIN 
          coursework ON grades.coursework_id = coursework.coursework_id
      INNER JOIN 
          subjects ON coursework.subject_code = subjects.subject_code
      INNER JOIN 
          coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
      WHERE 
          grades.student_id = $_SESSION[Account_ID] 
          AND coursework.subject_code = grades.subject_code 
          AND subjects.subject_code = 'CIS340' 
      ORDER BY  
          subjects.subject_code;";
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
          $subject_total_marks = 0;
          $result = $con->query($sql);
          $total = 0;
          $Div=0;
          if ($result->num_rows > 0) {
            $previous_subject = '';

            while ($row = $result->fetch_assoc()) {
              if ($row["subject_name"] != $previous_subject) {
                $A++;
                $C = 0;
                if ($previous_subject != '') {
                  echo "<td colspan='1' space='col'>المجمــــوع</td>";
                  echo "<td colspan='2'><div class='progress'>
                           <div class='progress-bar' role='progressbar' style='width: " . $subject_total_marks . "%; background-color: " . $pr_color . "; color: black;' aria-valuenow='" . $subject_total_marks . "'
                             aria-valuemin='0' aria-valuemax='100'>" . $subject_total_marks . "</div>
                              </div>
                               </td>";
                    echo "</tr>";
                    echo " </tr></tbody></table></div></div></div></div><br><br>";
                      $subject_total_marks = 0;
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
              $subject_total_marks += $row["coursework_mark"];
             
              //الألوان الخاصة بمجموع الدرجات لكل مقرر
              $pr_color = "";
              if ($subject_total_marks > 90) {
                $pr_color = "#6fe381";
              } elseif ($subject_total_marks >= 80 && $subject_total_marks <= 89) {
                $pr_color = "#d3ef5e";
              } elseif ($subject_total_marks >= 70 && $subject_total_marks <= 79) {
                $pr_color = "#fee43f";
              } elseif ($subject_total_marks >= 60 && $subject_total_marks <= 69) {
                $pr_color = "#f19c26";
              } else {
                $pr_color = "#ed4c36";
              }

                          
              $progress_width = ($row["coursework_mark"] / $row["coursework_grade"]) * 100;
              $total += $row["coursework_mark"];
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
                          <div class="progress-bar" role="progressbar" style="width:' . $progress_width . '%; background-color:' . $progress_color . '; color: black;" aria-valuenow="' . $progress_width . '"
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

            echo "<td colspan='1' space='col'>المجمــــوع</td>";
                echo "<td colspan='2'><div class='progress'>
                    <div class='progress-bar' role='progressbar' style='width: " . $subject_total_marks . "%; background-color: " . $pr_color . ";color: black;' aria-valuenow='" . $subject_total_marks . "' aria-valuemin='0' aria-valuemax='100'>" . $subject_total_marks . "</div>
                    </div>
                </td>";
                echo "</tr>";

            echo '</tbody></table></div></div></div></div><br><br>         
            ';
          } else {
            echo "<h3>لا يمكن التنبؤ في مادة نظم قواعد البيانات ما لم يتم دراستها في الفصل الحالي.</h3>";
            $Div=1;
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
          ?>         
        </div>
      </div>
    <?php

$DB_grade = array(0, 0);
$mid1=-1;$quiz1=-1;$quiz2=-1;
$mid2=-1;$quiz3=-1;$Project=-1;
$LABquiz=-1;$LABFinal=-1;$Final=-1;


$sql = "SELECT coursework_Mark FROM grades WHERE student_ID = {$_SESSION['Account_ID']} AND Subject_Code = 'CIS340' ORDER BY coursework_id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $DB_grade = array(); // Reset the array to be empty
    while($row = $result->fetch_assoc()) {
        array_push($DB_grade, $row['coursework_Mark']); // Add each value to the array
    }

    // Access array elements with error checking
    $quiz1 = isset($DB_grade[0]) ? $DB_grade[0] : -1;
    $mid1 = isset($DB_grade[1]) ? $DB_grade[1] : -1;
    $LABquiz = isset($DB_grade[2]) ? $DB_grade[2] : -1;

    $quiz2 = isset($DB_grade[3]) ? $DB_grade[3] : -1;
    $mid2 = isset($DB_grade[4]) ? $DB_grade[4] : -1;
    $Project = isset($DB_grade[5]) ? $DB_grade[5] : -1;
    $quiz3 = isset($DB_grade[6]) ? $DB_grade[6] : -1;
    $LABFinal = isset($DB_grade[7]) ? $DB_grade[7] : -1;

} else {
    $DB_grade = array(0, 0); // Set default values if no data found
}


$output=-1;
$mark = "التنبؤ غير متوفر لحد مايتم احتساب اول 3 متطلبات من المادة على الاقل.";
    if( $quiz1 > -1 && $mid1 > -1 && $LABquiz > -1 && $quiz2 > -1 && $mid2 > -1 && $Project > -1 && $quiz3 > -1 && $LABFinal > -1){
      
      $command = "java -cp \"C:\Program Files\Weka-3-8-6\\weka.jar;D:\Downloads_D\Java\Projects\GraduateProject\build\classes\" Database_Predction2.Seconde  $quiz1 $mid1 $LABquiz $quiz2 $mid2 $Project $quiz3 $LABFinal 2>&1";

      $output = shell_exec($command);

    } elseif ($quiz1 > -1 && $mid1 > -1 && $LABquiz > -1) {
      
      $command = "java -cp \"C:\Program Files\Weka-3-8-6\\weka.jar;D:\Downloads_D\Java\Projects\GraduateProject\build\classes\" Database_Predction.First $quiz1 $mid1 $LABquiz 2>&1";
    
      $output = shell_exec($command);
      
    } else {

      $output=-2;

    }
  
  if ($output == 1 || $output == 0) {
    $mark = "A+";
    $pr_color = "#6fe381";
  } else if ($output == 2) {
    $mark = "A";
    $pr_color = "#6fe381";
  } else if ($output == 3) {
    $mark = "B+";
    $pr_color = "#d3ef5e";
  } else if ($output == 4) {
    $mark = "B";
    $pr_color = "#d3ef5e";
  } else if ($output == 5) {
    $mark = "C+";
    $pr_color = "#fee43f";
  } else if ($output == 6) {
    $mark = "C";
    $pr_color = "#fee43f";
  } else if ($output == 7) {
    $mark = "D+";
    $pr_color = "#f19c26";
  } else if ($output == 8) {
    $mark = "D+";
    $pr_color = "#f19c26";
  } else if ($output == -2) {
    $mark = "التنبؤ غير متوفر لحد مايتم احتساب اول 3 متطلبات من المادة على الاقل.";
    $pr_color = "#ed4c36";
  }else {
    $mark = "F";
    $pr_color = "#ed4c36";
  }
 ?>
 <?php

 if($Div==0){ ?>
     <div class="col-12">
  <div class="card">
    <div class="card-body">
      <h2 class="text-center">التقدير المتوقع الحصول عليه في مادة نظم قواعد البيانات:</h2>
      <hr>
      <br>
      <div class="text-center">
        <?php
        switch ($mark) {
          case "A+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأخضر لتقدير A+
            break;
          case "A":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأزرق لتقدير A
            break;
          case "B+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأزرق الفاتح لتقدير B+
            break;
          case "B":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأصفر لتقدير B
            break;
          case "C+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون البرتقالي لتقدير C+
            break;
          case "C":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الرمادي لتقدير C
            break;
          case "D+":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأحمر لتقدير D+
            break;
          case "D":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الأحمر لتقدير D
            break;
          case "-2":
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 49px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 600px 28px 600px;" class="text">' . $mark . '</h5>'; // اللون الرمادي للنص التنبؤ غير متوفر
            break;
          default:
            echo '<h5 style="background-color: ' . $pr_color . '; color: black; font-size: 29px;    border-radius: 48px;padding: 27px 0px 30px 0px;margin: 32px 400px 28px 400px;" class="text">' . $mark . '</h5>'; // اللون الأحمر لتقدير F
            break;
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
 } else {

 } ?>
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
