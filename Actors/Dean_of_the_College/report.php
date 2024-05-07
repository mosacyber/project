<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>التقارير</title>

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
    footer_css()

    ?>

.table thead th, .jsgrid .jsgrid-table thead th {
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
          <?php
// استدعاء ملف الشاشة البداية
$loading_path = "content/content.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $loading_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
?>
          </div>
          <br>
          <br>
          <div class="page-header">
            <h3 class="page-title">
التقارير
            </h3>
          </div>

  




<!-- Revenue Card -->
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">معدلات الطلاب:</h4>
                    <canvas id="chart2"></canvas>

                </div>
            </div>
        </div>   
        <?php


$sql2 = "SELECT Program_ID FROM students";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$first_digit = substr($row2['Program_ID'], 0, 1);     




$sql = "SELECT COUNT(CASE WHEN GPA >= 4.75 THEN 1 END) AS count_students1,
COUNT(CASE WHEN GPA >= 4.25 AND GPA < 4.75 THEN 1 END) AS count_students2,
COUNT(CASE WHEN GPA >= 3.75 AND GPA < 4.25 THEN 1 END) AS count_students3,
COUNT(CASE WHEN GPA >= 3 AND GPA < 3.75 THEN 1 END) AS count_students4,
COUNT(CASE WHEN GPA >= 2 AND GPA < 3 THEN 1 END) AS count_students5 FROM students St
INNER JOIN student_gpa S ON S.student_ID = St.student_id
WHERE $first_digit = $firstDigit";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count_students1 = $row['count_students1'];
    $count_students2 = $row['count_students2'];
    $count_students3 = $row['count_students3'];
    $count_students4 = $row['count_students4'];
    $count_students5 = $row['count_students5'];
} else {
    $count_students1 = 0;
    $count_students2 = 0;
    $count_students3 = 0;
    $count_students4 = 0;
    $count_students5 = 0;
}

?>
<script>
    const labels = ['4.75', '4.25', '3.75', '3', '2'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'عدد الطلاب',
            data: [<?php echo $count_students1?>, <?php echo $count_students2?>, <?php echo $count_students3?>, <?php echo $count_students4?>, <?php echo $count_students5?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)'
            ],
            borderWidth: 1
        }]
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const myChart = new Chart(
        document.getElementById('chart2'),
        config
    );
</script>

<?php
// الاستعلام عن الأقسام المتوفرة
$sql_departments = "SELECT * FROM departments";
$result_departments = $conn->query($sql_departments);

// قائمة لتخزين عدد الطلاب لكل قسم
$students_count_per_department = [];

if ($result_departments->num_rows > 0) {
    while ($row_department = $result_departments->fetch_assoc()) {
        // الحصول على بادئة القسم
        $department_prefix = substr($row_department['Department_ID'], 0, 3); // افتراضاً أن بادئة القسم تتكون من 3 أرقام

        // الاستعلام عن عدد الطلاب في القسم المحدد
        $sql_students_count = "SELECT COUNT(*) AS students_count FROM students WHERE Program_ID LIKE '$department_prefix%'";
        $result_students_count = $conn->query($sql_students_count);

        // إذا تم العثور على عدد الطلاب
        if ($result_students_count && $result_students_count->num_rows > 0) {
            $row_students_count = $result_students_count->fetch_assoc();
            // تخزين عدد الطلاب لهذا القسم
            $students_count_per_department[$row_department['Department_Name']] = $row_students_count['students_count'];
        } else {
            // في حالة عدم العثور على عدد الطلاب لهذا القسم
            $students_count_per_department[$row_department['Department_Name']] = 0;
        }
    }
}

// تحويل البيانات إلى صيغة قابلة للاستخدام في JavaScript
$department_names = array_keys($students_count_per_department);
$students_count = array_values($students_count_per_department);
?>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">عدد الطلاب لكل  قسم:</h4>
                    <!-- عنصر Canvas لرسم الرسم البياني -->
                    <canvas id="barChart3"></canvas>
                </div>
            </div>
        </div>
        <script>
    const labels2 = <?php echo json_encode($department_names); ?>;
    const data2 = {
        labels: labels2,
        datasets: [{
            label: 'عدد الطلاب',
            data: <?php echo json_encode($students_count); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const config2 = {
        type: 'bar',
        data: data2,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    const myChart2 = new Chart(
        document.getElementById('barChart3'),
        config2
    );
</script>

<?php
$sql = "SELECT COUNT(CASE WHEN Prediction_grade_ID >= 9 THEN 1 END) AS count_students5,
COUNT(CASE WHEN Prediction_grade_ID >= 7 AND Prediction_grade_ID < 9 THEN 1 END) AS count_students4,
COUNT(CASE WHEN Prediction_grade_ID >= 5 AND Prediction_grade_ID < 7 THEN 1 END) AS count_students3,
COUNT(CASE WHEN Prediction_grade_ID >= 3 AND Prediction_grade_ID < 5 THEN 1 END) AS count_students2,
COUNT(CASE WHEN Prediction_grade_ID >= 0 AND Prediction_grade_ID < 3 THEN 1 END) AS count_students1 FROM students St
INNER JOIN Prediction P ON P.student_ID = St.student_id
WHERE $first_digit = $firstDigit";



$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count_students11 = $row['count_students1'];
    $count_students22 = $row['count_students2'];
    $count_students33 = $row['count_students3'];
    $count_students44 = $row['count_students4'];
    $count_students55 = $row['count_students5'];
} else {
    $count_students11 = 0;
    $count_students22 = 0;
    $count_students33 = 0;
    $count_students44 = 0;
    $count_students55 = 0;
}
?>

<div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">التنبؤ بالتخرج للطلاب:</h4>
            <canvas id="chart3"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels3 = ['ممتاز', 'جيد جدا', 'جيد', 'مقبول', 'ضعيف'];
    const data3 = {
        labels: labels3,
        datasets: [{
            label: 'عدد الطلاب',
            data: [<?php echo $count_students11?>, <?php echo $count_students22?>, <?php echo $count_students33?>, <?php echo $count_students44?>, <?php echo $count_students55?>], // تعديل البيانات للقيم الثابتة
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgb(54, 162, 235)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(255, 159, 64)',
                'rgb(255, 99, 132)'
            ],
            borderWidth: 1
        }]
    };

    const config3 = {
        type: 'bar',
        data: data3,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    const myChart3 = new Chart(
        document.getElementById('chart3'),
        config3
    );
</script>


<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد الطلاب:</h4>
            <?php
  

            $sql = "SELECT COUNT(*) AS total_students FROM students WHERE $first_digit = $firstDigit";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_students = $row['total_students'];
                echo "<h3>$total_students</h3>";
            } else {
                echo "<p>لا توجد بيانات</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php

$sql = "SELECT DISTINCT Semester_Number  
FROM current_semester 
WHERE Semester_Number = (SELECT MAX(Semester_Number) FROM current_semester)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();


    // عرض الفصل الدراسي
    $Max_Semster_Number = $row['Semester_Number'];
    // التأكد من وجود الفصل الدراسي
    if ($Max_Semster_Number !== null) {
        // استخدام switch مباشرة للتحقق من الفصل الدراسي
        switch (substr($Max_Semster_Number, 2, 3)) {
            case 1:
                $name = "الأول";
                break;
            case 2:
                $name = "الثاني";
                break;
            case 3:
                $name = "الثالث";
                break;
            case 4:
                $name = "الرابع";
                break;
            default:
                $name = "غير محدد";
                break;
        }
    } else {
        echo "لا يوجد فصول دراسية متاحة.";
    }
} else {
    echo "لا توجد بيانات";
}
?>
        <div class="col-lg-2 ">
            <div class="card"><!--  academic_record اعلى سمستر -->
                <div class="card-body">
                <h4 class="card-title">السنة الحالية | 14<?php echo substr($Max_Semster_Number, 0, 2); ?> هـ</h4>
                <h4 class="card-title">الفصل الدراسي  | <?php echo $name ?></h4>
                <hr>
                    <h4 class="card-title">عدد الطلاب المتفوقين:</h4>
                    <h3><?php echo $count_students1 + $count_students2  ?></h3>
                    <br>
                    <h4 class="card-title">عدد الطلاب المتعثرين:</h4>
                    <h3><?php echo $count_students5  ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php


    $Number1 = 5;
    $Number2 = 5;
    $Number3 = 5;
    $Number4 = 5;
    ?>
    <!-- الكود اللازم لرسم الرسم البياني -->
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $Number1?>,<?php echo $Number2?>,<?php echo $Number3?>,<?php echo $Number4?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        '#00ff00'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        '#00ff00'
                    ],
                }],
                labels: ['3<', '4 > 4.5', '3> 4','4.5 واعلى']
            },
            options: {
                responsive: false,
            }
        });




    </script>
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
