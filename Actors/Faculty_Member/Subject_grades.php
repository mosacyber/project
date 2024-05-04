<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>المقررات</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- تضمين ملفات CSS -->
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
        // تضمين ملفات CSS من داخل PHP
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
        }    .table thead th,
    .jsgrid .jsgrid-table thead th {
      border-top: 0;
      border-bottom-width: 1px;
      font-weight: bold;
      font-size: 1rem;
      background-color: #392e6e;
      color: #fff;
    }.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
}
    </style> 
</head>

<body class="rtl">
    <div class="container-scroller">

        <!-- تضمين نافبار -->
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

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="raw">
                    <div class="col-md-12 grid-margin ">
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
  
                </div>
                <br>
                <div class="page-header">
                    <h3 class="page-title">المقررات المسجلة<span> <? echo $_SESSION['Account_ID']?></span></h3>
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
                echo '<button name="subjectCode" class="btn btn-primary subject-button" style="font-size: 20px; text-align: center; margin: auto;" id='.$subjectBoxId.' data-subject-code='.$row['subject_code'].'>'.$row['subject_code_and_name'].'</button>';
                echo "</div></div></div>";
                echo "</div>";

                echo "<script>";
                echo "document.getElementById('$subjectBoxId').addEventListener('click', function() {";
                echo "document.getElementById('grades-table').style.display = 'block';";
                echo "});";
                echo "</script>";

            }
        } else {
            echo "<h3>لا توجد مقررات في الفصل الحالي.</h3>";
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $('.subject-button').click(function(){
                var subjectCode = $(this).data('subject-code');
                var subjectName = $(this).text(); // الحصول على قيمة النص من الزر
                $.ajax({
                    url: 'process_grades.php',
                    method: 'POST',
                    data: { 
                        subjectCode: subjectCode,
                        subjectName: subjectName // تمرير قيمة النص كمتغير جديد
                    },
                    success: function(response){
                        $('#grades-table').html(response);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
            });
        });
    </script>
</div>

<div id='grades-table' class='card info-card sales-card'>
    <div class='table-responsive'>
    </div>
</div>

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
  <!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller -->
  <!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller --><!-- container-scroller -->

  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>

</body>

<?php
download_js();
print_js();
?>

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- تضمين Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

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
</html>
