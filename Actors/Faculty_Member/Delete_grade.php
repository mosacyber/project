<?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
          include $path;
            break;
        }
    }

$studentid = $_POST['numberID'];
$subjectCode = $_POST['Code'];
$studentGrade = $_POST['Sgrade'];
$courseworkid = $_POST['courseID'];

$sql = "DELETE FROM `grades` WHERE `student_ID` = '$studentid' AND `coursework_id` = '$courseworkid' AND `coursework_Mark` = '$studentGrade' AND `Subject_Code` = '$subjectCode'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم حذف البيانات بنجاح!|{$subjectCode}"; // قيمة السبجت كود مضافة هنا
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>