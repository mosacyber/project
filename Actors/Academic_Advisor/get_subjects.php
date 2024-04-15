<?php 
$navbar_path = "Navbar/rtl/nav.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?><?php


// الاستعلام لاسترجاع بيانات المواد الدراسية
$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

// تحقق من وجود نتائج
if ($result->num_rows > 0) {
    // إنشاء مصفوفة لتخزين البيانات
    $subjects = array();

    // حلقة لجمع البيانات وتخزينها في المصفوفة
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }

    // إرجاع البيانات بتنسيق JSON
    echo json_encode($subjects);
} else {
    // إذا لم يتم العثور على بيانات
    echo json_encode(array('message' => 'لا يوجد بيانات'));
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
