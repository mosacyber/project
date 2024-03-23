<?php
// استلام قيمة لون المفضل من النموذج
$colorValue = $_POST['favcolor'];

// تعيين قيمة الكوكيز
setcookie('nav-color', $colorValue, time() + 3600, '/');

// الرد بنجاح
http_response_code(200);
?>
