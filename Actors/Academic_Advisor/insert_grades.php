<?php
$conn = @mysqli_connect("localhost", "root", "", "university_info") 
    or die(mysqli_connect_error());

$studentid = $_POST['sid'];
$subjectCode = $_POST['subject'];
$studentGrade = $_POST['gradeInput'];
$courseworkid = $_POST['num'];

$sql = "INSERT INTO `grades` (`student_ID`, `coursework_id`, `coursework_Mark`, `Subject_Code`) VALUES ('$studentid', '$courseworkid', '$studentGrade', '$subjectCode')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم أضافة البيانات بنجاح!";
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>
