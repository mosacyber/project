<?php
session_start();
$conn = @mysqli_connect("localhost", "root", "", "university_info") 
    or die(mysqli_connect_error());

$subjectName = $_POST['subjectName'];
$Hour = $_POST['Hour'];
$code = $_POST['code'];
$ID = $_SESSION['Program_ID'];

$sql = "DELETE FROM `subjects` WHERE `subjects`.`subject_code` = '$code' AND `subjects`.`Program_ID` = $ID";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم حذف البيانات بنجاح!|{$subjectCode}"; // قيمة السبجت كود مضافة هنا
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>