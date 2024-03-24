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
    "vendors/js/vendor.bundle.base.js",
    "vendors/js/vendor.bundle.addons.js",
    "js/off-canvas.js",
    "js/hoverable-collapse.js",
    "js/misc.js",
    "js/settings.js",
    "js/todolist.js",
    "js/dashboard.js"

    
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