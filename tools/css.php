<?php

//k

$css_files = [
    "vendors/iconfonts/font-awesome/css/all.min.css",
    "vendors/css/vendor.bundle.base.css",
    "vendors/css/vendor.bundle.addons.css",
    "style.css",
    "images/favicon.png" ,
    "assets/vendor/bootstrap/css/bootstrap.min.css",
    "assets/vendor/bootstrap-icons/bootstrap-icons.css",
    "assets/vendor/boxicons/css/boxicons.min.css",
    "assets/vendor/quill/quill.snow.css",
    "assets/vendor/quill/quill.bubble.css",
    "assets/vendor/remixicon/remixicon.css",
    "assets/vendor/simple-datatables/style.css"
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