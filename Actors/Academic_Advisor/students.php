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
    ?>

.table thead th, .jsgrid .jsgrid-table thead th {
    border-top: 0;
    border-bottom-width: 1px;
    font-weight: bold;
    font-size: 1rem;
    background-color: #392e6e;
    color: #fff;
}
  </style><style>
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

    .table tbody + tbody {
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
              <th scope="col">اسم الطالب</th>
              <th scope="col">التخصص</th>
              <th scope="col">معدله</th>

              <th scope="col">
              نسبته الحاليه
            </th>
              <th scope="col">/</th>
            </tr>
          </thead>
          <tbody>
    <?php
    if (isset($_SESSION['Account_ID'])) {
        // استعلام SQL لاسترداد بيانات معينة من الجدول
        $sql = "SELECT * FROM accounts";
        $result = $conn->query($sql);

        
        // التحقق من وجود بيانات للعرض
        if ($result->num_rows > 0) {
            // عرض البيانات
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $row["First_Name"] . '</td>';
              echo '<td>' . $row["Last_Name"] . '</td>';
              echo '<td>' . $row["Last_Name"] . '</td>';
              echo '<td>' . $row["Position"] . '</td>';
              // زر "عرض" لفتح ال Modal
              echo '<td>';
              echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal' . $row["Account_ID"] . '">عرض</button>';
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
              echo '<p>اسم : ' . $row["First_Name"] . '</p>';
              echo '<p> العائلة: ' . $row["Last_Name"] . '</p>';
              echo '<p>المنصب: ' . $row["Position"] . '</p>';
              echo '<br>';
              // جدول الدراسات
              echo '<table class="table">';
              echo '<thead>';
              echo '<tr>';
              echo '<th>رمز المادة</th>';
              echo '<th>اسم المادة</th>';
              echo '<th>ساعات الائتمان</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody id="subjectTableBody' . $row["Account_ID"] . '">';
              // الجدول سيتم ملؤه باستخدام AJAX
              echo '</tbody>';
              echo '</table>';
              echo '</div>';
              echo '<div class="modal-footer">';
              echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</td>';
              echo '</tr>';
              
            }
        } else {
            // إذا لم يتم العثور على بيانات
            echo '<tr><td colspan="4">لا يوجد بيانات لعرضها</td></tr>';
        }
    } else {
        echo "
        <div class='alert alert-danger'>
            <strong>تنبيه</strong>
            <hr>
            <p>هناك مشكلة في السيشن</p>
        </div>";
    }
    ?><script>
    // استدعاء الدالة عند فتح النافذة المنبثقة
    $('#detailsModal<?php echo $row["Account_ID"]; ?>').on('shown.bs.modal', function() {
        // استدعاء AJAX لجلب بيانات الجدول
        $.ajax({
            success: function(response) { 
                var html = '';
                $.each(response, function(index, data) {
                    html += '<tr>';
                    html += '<td>ال</td>';
                    html += '<td>لا</td>';
                    html += '<td>لات</td>';
                    html += '</tr>';
                });
                $('#subjectTableBody<?php echo $row["Account_ID"]; ?>').html(html);
            },
            error: function(xhr, status, error) { // دالة تُنفذ في حال حدوث خطأ
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
