<?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
          include $path;
            break;
        }
    }

$subjectName = $_POST['subjectName'];
$Hour = $_POST['Hour']; // تغيير هنا
$Ecode = $_POST['Ecode']; // تغيير هنا



$sql = "UPDATE subjects s
        JOIN current_semester cs ON s.subject_code = cs.subject_code
        SET s.credit_hours = '$Hour',
            s.subject_name = '$subjectName',
            s.subject_code = '$Ecode',
            cs.subject_code = '$Ecode'
        WHERE s.subject_code = '$Ecode'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم تحديث البيانات بنجاح!";
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>
