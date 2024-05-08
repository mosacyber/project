<?php

$navbar_path = "db/db.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}


// تحديد قاعدة البيانات التي ترغب في العمل عليها
$database_name = "university_info";
mysqli_select_db($conn, $database_name);

// استقبال القيمة المرسلة من الجانب العميل
if(isset($_POST['selectedValue'])) {
    // قم بتنظيف وتحضير القيمة لاستخدامها في الاستعلام
    $selectedValue = $_POST['selectedValue'];

    // قم بتنفيذ الاستعلام باستخدام القيمة المستقبلة
    if($selectedValue == "all") {
        $sql = "SELECT * FROM accounts";
    } else {
        $sql = "SELECT * FROM accounts WHERE Position = " . $selectedValue;
    }

    // تنفيذ الاستعلام
    $result = $conn->query($sql);

   // إنشاء الجدول لعرض البيانات
   if ($result->num_rows > 0) {
    echo "<table class='table datatable'>";
    echo "<thead><tr><th>رقم المعرف</th><th>الاسم</th><th>الايميل</th><th>رقم الجوال</th><th>المنصب</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        // استرجاع اسم المنصب من جدول المناصب
        $position_sql = "SELECT position_name FROM position WHERE position_id = " . $row['Position'];
        $position_result = $conn->query($position_sql);
        $position_row = $position_result->fetch_assoc();
        $position_name = $position_row['position_name'];

        // عرض السجل في الجدول
        echo "<tr>";
        echo "<td>" . $row["Account_ID"] . "</td>";
        echo "<td>" . $row["First_Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Mobile"] . "</td>";
        echo "<td>" . $position_name . "</td>";

        
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}
} else {
// إذا لم يتم استقبال قيمة صحيحة
echo "No value received";
}
?>