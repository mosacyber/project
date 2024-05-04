<?php
$js_files = [
    "assets/vendor/apexcharts/apexcharts.min.js",
    "assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/vendor/chart.js/chart.umd.js",
    "assets/vendor/echarts/echarts.min.js",
    "assets/vendor/quill/quill.min.js" ,
    "assets/vendor/simple-datatables/simple-datatables.js",
    "assets/vendor/tinymce/tinymce.min.js",
    "assets/vendor/php-email-form/validate.js",
    "assets/js/main.js",
    "assets/vendors/js/vendor.bundle.base.js",
    "assets/vendors/js/vendor.bundle.addons.js",
    "assets/js/off-canvas.js",
    "assets/js/hoverable-collapse.js",
    "assets/js/misc.js",
    "assets/js/settings.js",
    "assets/js/todolist.js",
    "assets/js/dashboard.js",
    "assets/vendors/css/vendor.bundle.addons.css",
    "assets/vendors/css/vendor.bundle.base.css",
    "assets/vendors/iconfonts/font-awesome/css/all.min.css",
    "tools/style.css",
    'assets/js/just-gage.js',
    'assets/js/chart.js',
    'assets/js/jquery.min.js',
    'assets/js/bootstrap.min.js'
  ];
  // تحقق من وجود ملفات الـ CSS وقم بتضمينها
  foreach ($js_files as $js_file) {
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $js_file;
        if (file_exists($path)) {
            echo "<script src='$path'></script>\n";
            break;
        }
    }
  }











?>