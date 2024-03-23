<!DOCTYPE html>
<html lang="ar">

<head> 




  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



 <?php include  '../../assets/css/all/css.php' ?>





  <title>لوحة التحكم</title>

  <!-- تضمين CSS الخاص -->
  <link href="styles.css" rel="stylesheet">
  <style>










/* زر القمر  */

.mode-switch {
  background-color: transparent;
  border: none;
  padding: 0;
  color: var(--main-color);
  display: flex;
  justify-content: center;
  align-items: center;
}.mode-switch.active .moon {
  fill: var(--main-color);
}.dark & {
    color: var(--secondary-color);

    input:checked + label {
      color: var(--star);
    }
  }
  .dark:root {
  --app-container: #1f1d2b;
  --app-container: #111827;
  --main-color: #fff;
  --secondary-color: rgba(255, 255, 255, 0.8);
  --projects-section: #1f2937;
  --link-color: rgba(255, 255, 255, 0.8);
  --link-color-hover: rgba(195, 207, 244, 0.1);
  --link-color-active-bg: rgba(195, 207, 244, 0.2);
  --button-bg: #1f2937;
  --search-area-bg: #1f2937;
  --message-box-hover: #243244;
  --message-box-border: rgba(255, 255, 255, 0.1);
  --star: #ffd92c;
  --light-font: rgba(255, 255, 255, 0.8);
  --more-list-bg: #2f3142;
  --more-list-bg-hover: rgba(195, 207, 244, 0.1);
  --more-list-shadow: rgba(195, 207, 244, 0.1);
  --message-btn: rgba(195, 207, 244, 0.1);
}
.dark & {
  box-shadow: none;
}
:root {
  --app-container: #f3f6fd;
  --main-color: #1f1c2e;
  --secondary-color: #4A4A4A;
  --link-color: #1f1c2e;
  --link-color-hover: #c3cff4;
  --link-color-active: #fff;
  --link-color-active-bg: #1f1c2e;
  --projects-section: #fff;
  --message-box-hover: #fafcff;
  --message-box-border: #e9ebf0;
  --more-list-bg: #fff;
  --more-list-bg-hover:  #f6fbff;
  --more-list-shadow: rgba(209, 209, 209, 0.4);
  --button-bg: #1f1c24;
  --search-area-bg: #fff;
  --star: #1ff1c2e;
  --message-btn: #fff;
}
body {
  background-color: var(--app-container);
  color: var(--main-color);
}
 .form-container{
  background-color: var(--app-container);
  color: var(--main-color);
}




/* تعريف الأنماط للسمة الداكنة */
.dark-theme {
  /* أضف الأنماط للسمة الداكنة هنا */
  background-color: #1f1f1f;
  color: #fff;
}

/* تعريف الأنماط للسمة الفاتحة */
/* أضف الأنماط للسمة الفاتحة هنا */

/* أنماط إضافية لزر تبديل السمة */
.mode-switch {
  background-color: transparent;
  border: none;
  padding: 0;
  cursor: pointer;
}

/* زر القمر  */





































.form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-outline-success {
  color: #fff;
  background-color: #198754;
  border-color: #198754;
}

.btn-outline-success:hover {
  color: #fff;
  background-color: #177a4a;
  border-color: #177a4a;
}

.btn-outline-secondary {
  color: #495057;
  background-color: #fff;
  border-color: #ced4da;
}

.btn-outline-secondary:hover {
  color: #495057;
  background-color: #e6e6e6;
  border-color: #ced4da;
}




















  body {
  direction: rtl;
  font-family: 'Arial', sans-serif;
}

.sidebar {
  position: fixed;
  top: 56px; /* ارتفاع الناف بار العلوي */
  right: 0;
  bottom: 0;
  width: 270px;
    padding-top: 15px;
  background-color: #343a40; /* لون الخلفية */
  transition: width 0.3s; /* تأثير التحول */
}

.sidebar.collapse {
  width: 56px; /* العرض عند الطي */
}

.sidebar .nav-link {
  color: #fff; /* لون النص */
}

/* استبدال هامش المحتوى بعد الناف بار الجانبي */
.content {
  padding: 20px;
}

/* تعديل هامش المحتوى عند إظهار وإخفاء الناف بار الجانبي */
@media (min-width: 992px) {
  .content {
    margin-right: 250px;
  }
}
@media (max-width: 992px) {
  .content {
    margin-right: 0;
  }
}









   .navbar-toggler {
      order: 1;
    }

    .navbar-brand {
      order: 2;
    }

    .sidebar {
      position: fixed;
      top: 56px;
      right: 0;
      bottom: 0;
      width: 250px;
      height: 100%;
      padding-top: 15px;
      background-color: #343a40;
      transition: width 0.5s ease-in-out, right 0.5s ease-in-out; /* تحديد تأثير التحول */
      overflow-x: hidden;
    }

    .sidebar.collapse {
      width: 56px;
      right: -250px;
    }

    .sidebar.collapse.show {
      right: 0;
    }

    .content {
      margin-right: 250px;
      padding: 20px;
      padding-top: 96px; /* ارتفاع الناف بار العلوي */
      transition: margin-right 0.5s ease-in-out; /* تحديد تأثير التحول */
    }

    /* تعديل موقع المحتوى عند الانكماش */
    @media (max-width: 992px) {
      .content {
        margin-right: 0;
      }
    }




 

 
    .rrrt {
    position: fixed;
    bottom: 0;
    padding-bottom: 21px;
}



    #sidebarCollapse > hr {
    margin: 1rem 0;
    color: #fff;
    border: 0;
    border-top: var(--bs-border-width) solid;
    opacity: .25;
}

.sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 0.075rem 0.075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 12.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}

  </style>
</head>

<body data-theme="light">









<script>
  document.addEventListener("DOMContentLoaded", function() {
  // Check if the theme preference is stored in a cookie
  const theme = getCookie("theme");

  // Apply the stored theme preference or default to light theme
  if (theme === "dark") {
    document.body.classList.add("dark-theme");
  }

  // Add event listener to the theme switch button
  document.getElementById("Switch_theme").addEventListener("click", function() {
    // Toggle between light and dark themes
    document.body.classList.toggle("dark-theme");

    // Update the cookie to store the current theme preference
    const currentTheme = document.body.classList.contains("dark-theme") ? "dark" : "light";
    document.cookie = `theme=${currentTheme}; path=/`;
  });
});

// Function to get cookie value by name
function getCookie(name) {
  const cookieArr = document.cookie.split(";").map(cookie => cookie.trim().split("="));
  const cookieObj = Object.fromEntries(cookieArr);
  return cookieObj[name];
}

</script>
















<?php include '../../navbar/admin/navbar.php'; ?>





  <!-- المحتوى الرئيسي -->
  <div class="content" >
    <div class=" container-fluid" >
      <h1>الرئيسية</h1>
      <p>مرحبا بك</p>


<div class="pagetitle">
  <h1>لوحة التحكم</h1>
 
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row " >

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Mondfgth</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Sales <span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Revenue <span>| This Month</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>$3,264</h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div align="right" dir="rtl" class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Customers <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1244</h6>
                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->







<!-- Recent Sales -->
<div class="col-12">

     
     









  <div class="card recent-sales overflow-auto">



    <div class="card-body">
      <h5 class="card-title">جدول البيانات</h5>
      <p>هنا تعرض البيانات.</p>
      <button onclick='printRecord("")' class="btn btn-secondary"><i class="bi bi-printer"></i> طباعة</button>
      <button id="downloadButton" onclick="downloadData()" class="btn btn-primary"><i class="bi bi-cloud-download"></i> تنزيل البيانات</button>
      <div id="loadingIndicator" style="display: none;">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">جارٍ التحميل...</span>
        </div>
      </div>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#filterModal"><i class="bi bi-funnel"></i> فلترة</button>
   

              <!-- Table with stripped rows -->
              <?php include '../db/data.php'; ?>
              <!-- End Table with stripped rows -->

            </div>

          </div>
        </div><!-- End Recent Sales -->





      </div>
    </div><!-- End Left side columns -->


 


<!-- إضافة مكتبة jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>


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

// استعلام SQL لاسترداد أسماء الكليات
$sql = "SELECT kid, kname FROM k";
$sql2 = "SELECT qid, qname FROM q";
$sql3 = "SELECT tid, tname FROM t";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

?>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">تصفية البيانات</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!--   دفعة 
                <div class="form-group">
                    <label for="range_05"><b>دفعة</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentOption" id="allPayments" value="allPayments" checked>
                        <label class="form-check-label" for="allPayments">جميع الدفعات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentOption" id="specificPayment" value="specificPayment">
                        <label class="form-check-label" for="specificPayment">تحديد نطاق الدفعة</label>
                    </div>
                    نطاق الدفعة 
                    <input type="text" id="range_05" class="form-control" style="display: none;">
                </div>
-->
                <!-- اختيار الكلية -->
                <div class="form-group">
                    <label for="college">اختر الكلية:</label>
                    <select class="form-control" id="college" name="college">
                        <option value="">حدد الكلية</option>
                        <option value="allk" >جميع الكليات</option>
                        <option value="07" >كليه الحاسبات وتقنيه المعلومات</option>
                        <option value="06" >كلية العلوم</option>

                        <!--?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["kid"] . "'>" . $row["kname"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>لا توجد كليات متاحة</option>";
                        }
                        ?>-->
                    </select>
                </div>

                <!-- اختيار البرنامج -->
                <div class="form-group" id="programGroup" style="display: none;">
                    <label for="program">اختر البرنامج:</label>
                    <select class="form-control" id="program" name="program">
                        <option value="">حدد البرنامج</option>
                        <option value="allq">جميع البرامج</option>
                        <option value="0702">برنامج علوم الحاسب</option>
                        <option value="0701">برنامج تقنيه المعلومات</option>


                        <!--?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                echo "<option value='" . $row["qid"] . "'>" . $row["qname"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>لا توجد برامج متاحة</option>";
                        }
                        ?>-->
                    </select>
                </div>

                <!-- اختيار التخصص -->
                <div class="form-group" id="specializationGroup" style="display: none;">
                    <label for="specialization">اختر التخصص:</label>
                    <select class="form-control" id="specialization" name="specialization">
                        <option value="">حدد التخصص</option>
                        <option value="allt">جميع التخصصات</option>
                        <option value="070101">علوم الحاسب</option>
                        <option value="070102">تقنيه المعلومات</option>

                        
                        <!--?php
                        if ($result3->num_rows > 0) {
                            while ($row = $result3->fetch_assoc()) {
                                echo "<option value='" . $row["tid"] . "'>" . $row["tname"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>لا توجد تخصصات متاحة</option>";
                        }
                        ?>-->
                    </select>
                </div>

              <!-- خيارات المرشحات -->
              <div class="form-check" id="filterOptions" style="display: none;">
                    <input class="form-check-input" type="radio" name="filterOption" value="accountID43" id="filterOption1">
                    <label class="form-check-label" for="filterOption1">accountID=43</label>
                </div>
                <div class="form-check" id="filterOptions">
                    <input class="form-check-input" type="radio" name="filterOption2" value="allData" id="filterOption2" >
                    <label class="form-check-label" for="filterOption2">مسح كل الفلاتر</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary" id="applyFilterBtn">تطبيق</button>
            </div>
        </div>
    </div>
</div>
<!-- End Filter Modal -->

<?php
// إغلاق الاتصال
$conn->close();
?>
<script>
$(document).ready(function () {
    // عند تغيير اختيار المستخدم
    $('input[name="paymentOption"]').change(function () {
        if ($(this).val() === 'specificPayment') {
            $('#range_05').show(); // إظهار حقل النطاق إذا تم اختيار "تحديد نطاق الدفعة"
        } else {
            $('#range_05').hide(); // إخفاء حقل النطاق في الحالات الأخرى
        }
    });

    // إعداد المدى الافتراضي للنطاق عند تحميل الصفحة
    $("#range_05").ionRangeSlider({
        type: "double",
        grid: true,
        min: 33,
        max: 45,
        from: 34,
        to: 44,
        step: 1
    });

  
});
</script>







<script>
  document.getElementById('applyFilterBtn').addEventListener('click', function(event) {
    event.preventDefault(); // منع السلوك الافتراضي للزر
    var filterValue = '';
    if (document.getElementById('filterOption1').checked) {
      filterValue = 'accountID43'; // تحديد قيمة الفلتر الأول
    } else if (document.getElementById('filterOption2').checked) {
      filterValue = 'allData'; // تحديد قيمة الفلتر الثاني
    }

    if (document.getElementById('college').value === 'allk') {
        filterValue = 'allk';
    }else if(document.getElementById('college').value === ' . $row["kid"] . '){
      filterValue = '. $row["kname"] . ';
    }






    // بناء الرابط مع استخدام الطريقة GET
    var url = window.location.pathname + '?filter=' + filterValue ;
    // إعادة توجيه المستخدم إلى الرابط الجديد
    window.location.href = url;
  });
</script>
















<script>// JavaScript






document.addEventListener("DOMContentLoaded", function() {
    var collegeSelect = document.getElementById("college");
    var programGroup = document.getElementById("programGroup");
    var programSelect = document.getElementById("program");
    var specializationGroup = document.getElementById("specializationGroup");
    var specializationSelect = document.getElementById("specialization");
    var filterOptions = document.getElementById("filterOptions");
    var applyFilterBtn = document.getElementById("applyFilterBtn");







    collegeSelect.addEventListener("change", function() {
        if (collegeSelect.value == "allk") {
            programGroup.style.display = "none";
            specializationGroup.style.display = "none";
            filterOptions.style.display = "block";
            applyFilterBtn.style.display = "block"; // Show apply filter button
        } else if (collegeSelect.value !== "") {
            programGroup.style.display = "block";
            programSelect.selectedIndex = 0; // Reset program selection
            specializationGroup.style.display = "none";
            filterOptions.style.display = "none";
            applyFilterBtn.style.display = "none"; // Hide apply filter button
        } else {
            programGroup.style.display = "none";
            specializationGroup.style.display = "none";
            filterOptions.style.display = "none";
            applyFilterBtn.style.display = "none"; // Hide apply filter button
        }
    });

    programSelect.addEventListener("change", function() {
        if (programSelect.value == "allq") {
            specializationGroup.style.display = "none";
            filterOptions.style.display = "block";
            applyFilterBtn.style.display = "block"; // Show apply filter button
        } else if (programSelect.value !== "") {
            specializationGroup.style.display = "block";
            specializationSelect.selectedIndex = 0; // Reset specialization selection
            filterOptions.style.display = "none";
            applyFilterBtn.style.display = "none"; // Hide apply filter button
        } else {
            specializationGroup.style.display = "none";
            filterOptions.style.display = "none";
            applyFilterBtn.style.display = "none"; // Hide apply filter button
        }
    });

    specializationSelect.addEventListener("change", function() {
        if (specializationSelect.value == "allt") {
            filterOptions.style.display = "block";
            applyFilterBtn.style.display = "block"; // Show apply filter button
        } else if (specializationSelect.value !== "") {
          filterOptions.style.display = "block";
            applyFilterBtn.style.display = "block"; // Hide apply filter button
        }else {
            filterOptions.style.display = "none";
            applyFilterBtn.style.display = "none"; // Hide apply filter button
        }
    });

    // Apply filter function
    applyFilterBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default button behavior
        applyFilter(); // Call applyFilter function
    });

    function applyFilter() {
        // Get the selected filter option
        var filterValue = document.querySelector('input[name="filterOption"]:checked').value;
        // Build the URL with the selected filter option
        var url = window.location.pathname + '?filter=' + filterValue;
        // Redirect the user to the new URL
        window.location.href = url;
    }
});
</script>



















<!-- End Filter Modal -->










    <!-- Right side columns -->
    <div class="col-lg-4" >





    



    </div><!-- End Right side columns -->

  </div>
</section>

    </div>
  </div>
<script>
// تحديد الناف بار الجانبي والمحتوى
const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('.content');

// السماح بفتح وإغلاق الناف بار الجانبي عبر الناف العلوي
document.querySelector('.navbar-toggler').addEventListener('click', function() {
  sidebar.classList.toggle('collapse');
  if (sidebar.classList.contains('collapse')) {
    // إذا تمت إخفاء الناف بار الجانبي، زيادة هامش المحتوى
    content.style.marginRight = '0';
  } else {
    // إذا تمت إظهاره، تقليل هامش المحتوى
    content.style.marginRight = sidebar.offsetWidth + 'px';
  }
});

// ضبط هامش المحتوى عند التحميل الأولي
if (sidebar.classList.contains('collapse')) {
  content.style.marginRight = '0';
} else {
  content.style.marginRight = sidebar.offsetWidth + 'px';
}

// ضبط هامش المحتوى عند تغيير حجم الناف بار الجانبي
window.addEventListener('resize', function() {
  if (!sidebar.classList.contains('collapse')) {
    content.style.marginRight = sidebar.offsetWidth + 'px';
  }
});
</script>

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




<!--print-->
  <script>
function printRecord(accountID) {
    // إخفاء زر الطباعة لتجنب إعادة الطباعة
    var printButton = document.querySelector('button[onclick="printRecord(' + accountID + ')"]');
    if (printButton) {
        printButton.style.display = 'none';
    }
    
    // إخفاء جميع العناصر الأخرى غير الجدول
    var elementsToHide = document.querySelectorAll('body > :not(table)');
    for (var i = 0; i < elementsToHide.length; i++) {
        elementsToHide[i].style.display = 'none';
    }
    
    // طباعة الجدول المعني
    var printContents = document.querySelector('table.datatable');
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents.outerHTML;
    window.print();
    document.body.innerHTML = originalContents;
    
    // إظهار العناصر التي تم إخفاؤها مرة أخرى
    for (var i = 0; i < elementsToHide.length; i++) {
        elementsToHide[i].style.display = '';
    }
    
    // إظهار زر الطباعة مرة أخرى بعد الطباعة
    if (printButton) {
        printButton.style.display = '';
    }
}
</script>



<!--downloadData-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script>
function downloadData() {
    var downloadButton = document.getElementById('downloadButton');
    var loadingIndicator = document.getElementById('loadingIndicator');

    // إظهار عنصر عرض التحميل وإخفاء زر التنزيل
    downloadButton.style.display = 'none';
    loadingIndicator.style.display = 'inline-block';

    setTimeout(function() {
        var table = document.querySelector('table.datatable');
        var rows = table.querySelectorAll('tr');
        var csv = [];

        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll('td, th');

            for (var j = 0; j < cols.length; j++) {
                row.push(cols[j].innerText);
            }

            csv.push(row.join(','));
        }

        var csvContent = csv.join('\n');
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });
        var url = window.URL.createObjectURL(blob);

        // إعادة إظهار زر التنزيل وإخفاء عنصر عرض التحميل
        loadingIndicator.style.display = 'none';
        downloadButton.style.display = 'inline-block';

        // إنشاء عنصر رابط وتنزيل الملف
        var a = document.createElement('a');
        a.href = url;
        a.download = 'data.csv';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
    }, 3000); // انتظر 3 ثواني قبل تنزيل الملف
}
</script>






</body>

</html>
