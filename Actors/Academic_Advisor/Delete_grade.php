<?php
$conn = @mysqli_connect("localhost", "root", "", "university_info") 
    or die(mysqli_connect_error());

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