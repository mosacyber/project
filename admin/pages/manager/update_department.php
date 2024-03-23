<?php
// تأسيس الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_info";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من وجود بيانات مرسلة عبر طلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editDepartmentId']) && isset($_POST['editDepartmentName'])) {
    // تعيين القيم للمتغيرات المحلية
    $editDepartmentId = $_POST['editDepartmentId'];
    $editDepartmentName = $_POST['editDepartmentName'];

    // تحضير وتنفيذ استعلام SQL
    $stmt = $conn->prepare("UPDATE departments SET Department_Name=? WHERE Department_ID=?");
    $stmt->bind_param("si", $editDepartmentName, $editDepartmentId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('location: شيي');
    } else {
        echo "حدث خطأ أثناء تحديث السجل: " . $conn->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $conn->close();
} else {
    echo "قيم غير موجودة في مصفوفة \$_POST";
}
?>
