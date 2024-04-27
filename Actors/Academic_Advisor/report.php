<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

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
التقارير
            </h3>
          </div>

  




<!-- Revenue Card -->
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">معدلات الطلاب</h4>
                    <canvas id="chart2"></canvas>

                </div>
            </div>
        </div>   
        <?php
$sql = "SELECT COUNT(CASE WHEN GPA >= 4.75 THEN 1 END) AS count_students1,
COUNT(CASE WHEN GPA >= 4.25 AND GPA < 4.75 THEN 1 END) AS count_students2,
COUNT(CASE WHEN GPA >= 3.75 AND GPA < 4.25 THEN 1 END) AS count_students3,
COUNT(CASE WHEN GPA >= 3 AND GPA < 3.75 THEN 1 END) AS count_students4,
COUNT(CASE WHEN GPA >= 2 AND GPA < 3 THEN 1 END) AS count_students5 FROM academic_advisor_for_student A
INNER JOIN student_gpa S ON S.student_ID = A.student_id
WHERE A.Academic_Advisor_ID = $_SESSION[Account_ID];";

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

        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">عدد الطلاب لكل عام دراسي</h4>
                    <!-- عنصر Canvas لرسم الرسم البياني -->
                    <canvas id="barChart2"></canvas>
                </div>
            </div>
        </div>
        <script>
        const labels2 = ['march', 'april', 'may', 'jun', 'july', 'Aug', 'Sep'];
        const data2 = {
            labels2: labels2,
            datasets: [{
                label2: 'My First Dataset',
                data2: [65, 59, 80, 81, 56, 55, 40],
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
    </script>




        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const config2 = {
            type: 'bar',
            data2: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        const myChart2 = new Chart(
            document.getElementById('barChart2'),
            config
        );
    </script>



        

<div class="col-lg-2">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">عدد الطلاب</h4>
            <?php
            $sql = "SELECT COUNT(*) AS total_students FROM academic_advisor_for_student WHERE Academic_Advisor_ID = $_SESSION[Account_ID]";
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

$sql = "SELECT Semster_Number, COUNT(CASE WHEN grade >= 85 THEN 1 END) AS passing_students,
        COUNT(CASE WHEN grade <= 60 THEN 1 END) AS failing_students
        FROM academic_record
        WHERE Semster_Number = (SELECT MAX(Semster_Number) FROM academic_record)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $sum_students1 = $row['passing_students'];
    $sum_students2 = $row['failing_students'];

    // عرض الفصل الدراسي
    $Max_Semster_Number = $row['Semster_Number'];
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
                <h4 class="card-title">السمستر الحالي | 14<?php echo substr($Max_Semster_Number, 0, 2); ?> هـ</h4>
                <h4 class="card-title">الفصل الدراسي  | <?php echo $name ?></h4>

                <hr>
                    <h4 class="card-title">عدد الطلاب المتفوقين</h4>
                    <h3><?php echo $sum_students1  ?></h3>
                    <br>
                    <h4 class="card-title">عدد الطلاب المتعثرين</h4>
                    <h3><?php echo $sum_students2  ?></h3>
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






<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
</html>
