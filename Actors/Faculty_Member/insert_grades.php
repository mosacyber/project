<?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
          include $path;
            break;
        }
    }

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
