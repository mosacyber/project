
<?php
// تأسيس الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم
$password = ""; // كلمة المرور
$dbname = "university_info"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);
 
// التحقق من الاتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// استعلام SQL لاسترداد البيانات
$sql = "SELECT * FROM accounts";

// التحقق من وجود فلتر محدد وتحديد الفلتر الذي يجب تطبيقه
if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
  if ($filter == 'accountID43') {
    $sql .= " WHERE Account_ID = 43"; // تطبيق الفلتر الأول
  } elseif ($filter == 'allData') {
    // لا تطبيق أي فلتر، استعراض كل البيانات
  }
}



$result = $conn->query($sql);


?>







<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>





<?php


$css_files = [
  "vendors/iconfonts/font-awesome/css/all.min.cs",
  "vendors/css/vendor.bundle.base.css",
  "vendors/css/vendor.bundle.addons.css",
  "style.css",
  "images/favicon.png"
];
// تحقق من وجود ملفات الـ CSS وقم بتضمينها
foreach ($css_files as $css_file) {
  for ($i = 0; $i < 9; $i++) {
      $path = str_repeat("../", $i) . $css_file;
      if (file_exists($path)) {
          echo "<link href='$path' rel='stylesheet'>\n";
          break;
      }
  }
}



?>








<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Ni9s8im2WpeR2zUZvSx/9PPB0Rb3G5irzzs8vTp51Jr3L5LeY9FfRX3eMk2AFcz+7sTOsPRw/EXcPeaP3C+nkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  
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
    ?>.material-icons {
      font-family: 'Material Icons';
      font-weight: normal;
      font-style: normal;
      font-size: 20px;
      line-height: 1;
      letter-spacing: normal;
      text-transform: none;
      display: inline-block;
      white-space: nowrap;
      word-wrap: normal;
      direction: ltr;
      -webkit-font-feature-settings: 'liga';
      -webkit-font-smoothing: antialiased;
      display: contents;
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
الاضافه
            </h3>
          </div>

          <div class="row">

            <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">الكليات</h4>
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                          College_Name
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                          $sql = "SELECT * FROM  colleges";
                          $result = $conn->query($sql);
            
                          while($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>". $row["College_ID"] ."</td>";
                          echo "<td>". $row["College_Name"] ."</td>";
                          echo "</tr>";
                          }
                      ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">الاقسام</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department_Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql_departments = "SELECT * FROM departments"; // تغيير اسم المتغير هنا
                            $result_departments = $conn->query($sql_departments); // تغيير اسم المتغير هنا
                            while($row = $result_departments->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>". $row["Department_ID"] ."</td>";
                                echo "<td>". $row["Department_Name"] ."</td>";
                                echo "<td>";
                                echo "<a href='#' class='edit-button' data-toggle='modal' data-target='#exampleModal' data-department-id='". $row["Department_ID"] ."' data-department-name='". $row["Department_Name"] ."' style='text-decoration: none !important;'><i class='material-icons'>edit</i></a> ";
                                echo "<a href='#' style='text-decoration: none !important;'><i class='material-icons'>visibility</i></a> ";
                                echo "<a href='#' onclick='openDeleteModal(\"".$row["Department_Name"]."\")' style='text-decoration: none !important;'><i class='material-icons'>delete</i></a> ";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<!-- التعديل -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">التعديل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="modal-body">
          <input type="text" name="editDepartmentId" id="editDepartmentId">
          <input type="text" name="editDepartmentName" id="editDepartmentName">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        </div>
        </form>
       
      
    </div>
  </div>
</div>
<!-- التعديل -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // تفعيل النموذج لإرسال البيانات عبر AJAX
            $("#editForm").submit(function(e){
                e.preventDefault(); // منع تقديم النموذج بطريقة تقليدية
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(), // تسلسل البيانات من النموذج
                    success: function(response){
                        alert(response); // عرض رسالة النجاح أو الفشل
                        location.reload(); // إعادة تحميل الصفحة بعد الانتهاء
                    }
                });
            });

            // تعيين قيم القسم للنموذج عند النقر على زر التعديل
            $(".edit-button").click(function(){
                var departmentId = $(this).data("department-id");
                var departmentName = $(this).data("department-name");
                $("#editDepartmentId").val(departmentId);
                $("#editDepartmentName").val(departmentName);
            });
        });
    </script>













<!-- الحذف -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">الحذف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>هل أنت متأكد من حذف <span id="deleteItemName"></span>؟</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <!-- زر حذف مرتبط بدالة JavaScript للحذف -->
        <button type="button" class="btn btn-primary" onclick="deleteItem()">حذف</button>
      </div>
    </div>
  </div>
</div>

<script>
  // دالة لفتح الشاشة المنبثقة وتحديث نصها
  function openDeleteModal(elementId, itemName) {
    document.getElementById('deleteItemName').innerText = itemName;
    $('#exampleModalCenter').modal('show');
  }

  // دالة للحذف عند الضغط على زر "حذف"
  function deleteItem() {
    // احتمالاً، يمكنك استخدام AJAX لإرسال طلب حذف إلى الخادم هنا
    // على سبيل المثال:
    // $.post("./api.php?action=delete&id=" + itemId, function(data) {
    //   // التعامل مع الاستجابة هنا
    // });
    // في هذا المثال، سنقوم بطباعة رسالة في وحدة التحكم للتأكد من أن الدالة تعمل بشكل صحيح
    console.log('تم حذف العنصر');
    // يمكنك هنا استدعاء دالة PHP للقيام بعملية الحذف في الخادم
  }
</script>
<!-- الحذف  -->



























            <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">البرامج</h4>
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                          #
                          </th>
                          <th>
                          Program_Name
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                          $sql = "SELECT * FROM  programs";
                          $result = $conn->query($sql);
            
                          while($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>". $row["Program_ID"] ."</td>";
                          echo "<td>". $row["Program_Name"] ."</td>";
                          echo "</tr>";
                          }
                      ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">التخصصات</h4>

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



  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>






  <?php


$js_files = [
  "assets/js/main.js",
  "assets/vendor/php-email-form/validate.js",
  "assets/vendor/tinymce/tinymce.min.js",
  "assets/vendor/simple-datatables/simple-datatables.js",
  "assets/vendor/quill/quill.min.js",
  "assets/vendor/echarts/echarts.min.js",
  "assets/vendor/chart.js/chart.umd.js",
  "assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
  "assets/vendor/apexcharts/apexcharts.min.js",
  "js/dashboard.js",
  "js/todolist.js",
  "js/settings.js",
  "js/misc.js",
  "js/hoverable-collapse.js",
  "js/off-canvas.js",
  "vendors/js/vendor.bundle.addons.js",
"vendors/js/vendor.bundle.base.js"
];
// تحقق من وجود ملفات الـ CSS وقم بتضمينها
foreach ($css_files as $css_file) {
  for ($i = 0; $i < 11; $i++) {
      $path = str_repeat("../", $i) . $css_file;
      if (file_exists($path)) {
          echo "<link href='$path' rel='stylesheet'>\n";
          break;
      }
  }
}



?>




<?php
 download_js();
 print_js();
?>















<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
</html>
