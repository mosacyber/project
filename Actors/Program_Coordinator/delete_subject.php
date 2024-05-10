<?php
session_start();
$navbar_path = "db/db.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}

$subjectName = $_POST['subjectName'];
$Hour = $_POST['Hour'];
$code = $_POST['code'];
$ID = $_SESSION['Program_ID'];

$sql = "DELETE FROM `subjects` WHERE `subjects`.`subject_code` = '$code' AND `subjects`.`Program_ID` = $ID";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم حذف البيانات بنجاح!|{$subjectCode}"; 
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>