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

     $programID = $_SESSION['Program_ID'];
     $subjectName = $_POST['subjectName'];
     $subjectCode = $_POST['subjectCode'];
     $numberHour = $_POST['numberHour'];

$sql = "INSERT INTO `subjects` (`subject_code`, `Program_ID`, `subject_name`, `credit_hours`) VALUES ('$subjectCode', $programID, '$subjectName', '$numberHour')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم أضافة البيانات بنجاح!";
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>
