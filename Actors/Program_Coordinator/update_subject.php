<?php
$conn = @mysqli_connect("localhost", "root", "", "university_info") 
    or die(mysqli_connect_error());

$subjectName = $_POST['subjectName'];
$Hour = $_POST['Hour']; // تغيير هنا

$sql = "UPDATE subjects 
        SET credit_hours = '$Hour' 
        WHERE subject_name = '$subjectName'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "تم تحديث البيانات بنجاح!";
} else {
    echo "حدث خطأ أثناء تحديث البيانات!";
}

mysqli_close($conn);
?>
