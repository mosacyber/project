<?php
$conn = @mysqli_connect("localhost", "root", "", "university_info") 
    or die(mysqli_connect_error());

$studentid = $_POST['studentid'];
$studentName = $_POST['studentName'];
$subjectCode = $_POST['subjectCode'];
$activityName = $_POST['activityName']; // تغيير هنا
$studentGrade = $_POST['studentGrade'];
$courseworkid = $_POST['courseworkid'];

$sql = "UPDATE grades 
        SET coursework_Mark = '$studentGrade' 
        WHERE subject_code = '$subjectCode' AND student_id = '$studentid' AND coursework_id = '$courseworkid'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم تحديث البيانات بنجاح!";
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>
