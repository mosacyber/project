<?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
          include $path;
            break;
        }
    }

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
