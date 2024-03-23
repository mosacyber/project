



<!--  للصفحات التي فيها فلتره البيانات--------------->

<?php
// تحقق مما إذا كان الموقع قد فُتِحَ للمرة الأولى

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

// استعلام SQL لاسترداد أسماء الكليات
$sql = "SELECT College_ID,College_Name FROM colleges";
$sql2 = "SELECT Department_ID,Department_Name FROM departments";
$sql3 = "SELECT Program_ID,Program_Name FROM programs";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

// تحقق من نجاح الاستعلام
if ($result === FALSE || $result2 === FALSE || $result3 === FALSE) {
    die("Error in SQL queries: " . $conn->error);
}

// تحويل البيانات إلى مصفوفة
$data = array();

while ($row = $result->fetch_assoc()) {
    $data['k'][] = $row;
}

while ($row = $result2->fetch_assoc()) {
    $data['q'][] = $row;
}

while ($row = $result3->fetch_assoc()) {
    $data['t'][] = $row;
}

// حفظ البيانات في ملف JSON بتنسيق منظم وواضح
$json_data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if (file_put_contents('data.json', $json_data) === FALSE) {
    die("Error saving data to JSON file.");
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>

<!--  للصفحات التي فيها فلتره البيانات--------------->




































<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />

  <style>
    <?php
    include '../tools/tools.php';
    download_css();
    print_css();
    ?>
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
              الصفحه الرئيسية
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
عدد الطلاب والطالبات
                        </p>
                        <h2>54000</h2>
                        <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Avg Time
                        </p>
                        <h2>123.50</h2>
                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                          عدد التقارير
                        </p>
                        <h2>3500</h2>
                        <label class="badge badge-outline-success badge-pill">12% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          عدد التحميلات
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          عدد الطلاب المتعثرين
                        </p>
                        <h2>9000</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Pending
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">جدول بيانات</h4>
                  <p class="card-description">
جدول الطلاب المتعثرين
                  </p>
                  <div class="table-responsive">      <button onclick='printRecord("")' class="btn btn-secondary"><i class="bi bi-printer"></i> طباعة</button>

                  <button id="downloadButton" onclick="downloadData()" class="btn btn-primary"><i class="bi bi-cloud-download"></i> تنزيل البيانات</button>
      <div id="loadingIndicator" style="display: none;">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">جارٍ التحميل...</span>
        </div>
      </div>
      <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-funnel"></i> فلترة</button>
   


 

      
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include '../db/data.php';?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>









<?php 
$navbar_path = "tools/pop.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?>
<!-- الكليات   --->
<script>
    function updatePrograms() {
        const collegeSelect = document.getElementById("college");
        const selectedCollege = collegeSelect.value;
        const programSelect = document.getElementById("program");
        programSelect.innerHTML = "<option value=''>حدد البرنامج</option>"; // استعادة القيمة الافتراضية

        if (selectedCollege === "") return; // لا يوجد كلية محددة

        fetch("data.json")
            .then(response => response.json())
            .then(data => {
                const programs = data.q;
                programs.forEach(program => {
                    if (program.Department_ID.startsWith(selectedCollege)) {
                        const option = document.createElement("option");
                        option.value = program.Department_ID;
                        option.textContent = program.Department_Name;
                        programSelect.appendChild(option);
                    }
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });
    }

    // تحديث قائمة البرامج عند تغيير الكلية
    updatePrograms();
</script>
<!-- الكليات   --->



<!--   التخصصات #  ---->
<script>
    function updateSpecializations() {
        const programSelect = document.getElementById("program");
        const selectedProgram = programSelect.value;
        const specializationSelect = document.getElementById("specialization");
        specializationSelect.innerHTML = "<option value=''>حدد التخصص</option>"; // استعادة القيمة الافتراضية

        if (selectedProgram === "") return; // لا يوجد برنامج محدد

        fetch("data.json")
            .then(response => response.json())
            .then(data => {
                const specializations = data.t;
                specializations.forEach(specialization => {
                    // استخراج الرقم الأولين من رقم التخصص
                    const specializationPrefix = specialization.Program_ID.substr(0, 3);
                    // التحقق من تطابق رقم التخصص مع رقم البرنامج
                    if (specializationPrefix === selectedProgram.substr(0, 3)) {
                        const option = document.createElement("option");
                        option.value = specialization.Program_ID;
                        option.textContent = specialization.Program_Name;
                        specializationSelect.appendChild(option);
                    }
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });
    }

    // تحديث قائمة التخصصات عند تغيير البرنامج
    document.getElementById("program").addEventListener("change", updateSpecializations);

    // تحديث قائمة التخصصات عند التحميل الأولي
    updateSpecializations();
</script>
<!--   التخصصات #  ---->







<!---        تقوم بتحديث القائمة واخفاء البرامج والتخصصات        --->
<script>
    function updateall() {
        const collegeSelect = document.getElementById("college");
        const selectedCollege = collegeSelect.value;
        const programGroup = document.getElementById("programGroup");
        const specializationGroup = document.getElementById("specializationGroup");

        // إذا تم اختيار "جميع الكليات"، فأخفِ قائمة البرامج والتخصصات وامسح البرامج والتخصصات
        if (selectedCollege === "allk") {
            programGroup.style.display = "none";
            specializationGroup.style.display = "none";

            // إزالة البرامج
            const programSelect = document.getElementById("program");
            programSelect.innerHTML = "<option value=''>حدد البرنامج</option>";

            // إزالة التخصصات
            const specializationSelect = document.getElementById("specialization");
            specializationSelect.innerHTML = "<option value=''>حدد التخصص</option>";
            return;
        }

        // إذا تم اختيار كلية محددة، فعرض قائمة البرامج وأخفِ قائمة التخصصات
        programGroup.style.display = "block";
        specializationGroup.style.display = "block";
        // قم بتحديث قائمة البرامج
        // ...
    }

    // تحديث قائمة البرامج عند تغيير الكلية
    document.getElementById("college").addEventListener("change", updateall);

    // تحديث قائمة التخصصات عند تغيير البرنامج
    // ...

    // تحديث قائمة البرامج والتخصصات عند التحميل الأولي
    updateall();
</script>
<!---        تقوم بتحديث القائمة واخفاء البرامج والتخصصات        --->



<!-------    تقوم بحذف كل التخصصات اذا تغيرت الكليه    --->
<script>
    function clearSpecializations() {
        const specializationSelect = document.getElementById("specialization");
        specializationSelect.innerHTML = "<option value=''>حدد التخصص</option>";
    }

    // تحديث قائمة التخصصات عند تغيير الكلية
    document.getElementById("college").addEventListener("change", clearSpecializations);
</script>
<!-------    تقوم بحذف كل التخصصات اذا تغيرت الكليه    --->







            </div>
            <div class="col-md-6 grid-margin stretch-card">
         
            <div class="card">
                <div class="card-body"> 
               

                  <h4 class="card-title">جدول بيانات</h4>
                  <p class="card-description">
جدول الطلاب المتعثرين
                  </p>
                  
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

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>



  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <!-- Vendor JS Files -->
   <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
















<?php
 download_js();
 print_js();
?>















<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
</html>
