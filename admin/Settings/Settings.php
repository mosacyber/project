<!--?php
$config_file = file_get_contents('../../../include.json');
$config = json_decode($config_file, true);

if ($config === null || !isset($config['navbar_paths']) || !isset($config['fonts'])) {
    echo "خطأ: لم يتم تحميل الإعدادات بشكل صحيح.";
    exit;
}

// تضمين الخطوط
foreach ($config['fonts'] as $key => $font_link) {
    echo $font_link; // طباعة رابط الخطوط
}

// تضمين ملفات النافبار
foreach ($config['navbar_paths'] as $key => $path) {
    $full_path = __DIR__ . DIRECTORY_SEPARATOR . $path; // جعل المسار مطلقًا باستخدام __DIR__
    if (file_exists($full_path)) {
        include $full_path;
    } else {
        echo "خطأ: الملف في المسار $key غير موجود: $path";
    }
}
?>-->



 









  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<!DOCTYPE html>
<html lang="ar">

<head> 

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>لوحة التحكم</title>
  <!-- تضمين Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
</head>

<body>
  






  <!-- المحتوى الرئيسي -->
  <div class="content" >
    <div class=" container-fluid" >
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


<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../../assets/img/profile-img.png" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['Name']; ?></h2>
              <h3><?php echo $_SESSION['Account_ID']; ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">نظره عامة</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">تعديل البيانات</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">الاعدادات</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">تغير كلمة المرور</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">عن</h5>
                  <p class="small fst-italic"><?php echo $_SESSION['about']; ?></p>

                  <h5 class="card-title">المعلومات الاساسية</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم كامل</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name']; ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">المنصب</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Position']; ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">رقم الجوال</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Mobile']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Email']; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="profileForm">
    <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">الصورة الشخصية</label>
        <div class="col-md-8 col-lg-9">
        <img id="previewImage" src="../../assets/img/profile-img.png" alt="Profile" style="width: 150px; height: 150px;">
            <div class="pt-2">
                <label for="file-upload" class="btn btn-primary btn-sm" title="Upload new profile image">
                    <i class="bi bi-upload"></i> اختيار الصورة
                </label>
                <input id="file-upload" type="file" accept=".png, .jpg" style="display: none;" onchange="previewFile()">

                <script>
    function previewFile() {
        const preview = document.getElementById('previewImage');
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "../../assets/img/profile-img.jpg";
        }
    }
</script>





                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
            </div>
        </div>
    </div>


                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">عن</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo $_SESSION['about']; ?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">رقم الجوال</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $_SESSION['Mobile']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">البريد الالكتروني</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $_SESSION['Email']; ?>">
                      </div>
                    </div>

                   
     <!-- الحقول الأخرى هنا -->
     <div class="text-center">
        <button type="submit" id="saveChangesButton" class="btn btn-primary">حفظ التعديلات</button>
    </div>
                  </form><!-- End Profile Edit Form -->
                  <script>
    function previewFile() {
        const preview = document.getElementById('previewImage');
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "../../assets/img/profile-img.jpg";
        }
    }

    function removeProfileImage() {
        const preview = document.getElementById('previewImage');
        preview.src = "../../assets/img/profile-img.jpg";
    }

    function saveChanges() {
        const imagePath = document.getElementById('previewImage').src;
        // تخزين المسار في الـ Session
        <?php
        session_start();
        $_SESSION['profile_image'] = "<script>document.getElementById('previewImage').src</script>";
        ?>
        // طباعة المسار
        console.log('مسار الصورة:', imagePath);
    }
</script>
                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">كلمة المرور الحاليه</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">كلمة المرور الجديده</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">اعد ادخال كمله المرور</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">تغير كلمة المرور</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

    </div>
  </div>












<!--
هناك مشكله في الجوال 
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
</script>-->
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
</body>

</html>
