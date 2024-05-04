
<?php
// تأسيس الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم
$password = ""; // كلمة المرور
$dbname = "university_info"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);
 
// التحقق من الاتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$text ="where Position = 3";
$none="";


$ok = "";

// استعلام SQL لاسترداد البيانات
$sql = "SELECT * FROM accounts $ok";

// التحقق من وجود فلتر محدد وتحديد الفلتر الذي يجب تطبيقه
if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
  if ($filter == 'accountID43') {
    $sql .= " WHERE Account_ID = 43"; // تطبيق الفلتر الأول
  } elseif ($filter == 'allData') {
    // لا تطبيق أي فلتر، استعراض كل البيانات
  }
}



$result = $conn->query($sql);





 







  if ($result->num_rows > 0) {
    // إخراج البيانات بشكل جدول
    echo "<table class='table datatable'>";
    echo "<thead><tr><th>Account_ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Position</th></tr></thead>";
    echo "<tbody>";
    // إخراج البيانات في كل صف
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["Account_ID"] . "</td>";
      echo "<td>" . $row["First_Name"] . "</td>";
      echo "<td>" . $row["Email"] . "</td>";
      echo "<td>" . $row["Mobile"] . "</td>";
      echo "<td>" . $row["Position"] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  } else {
    echo "0 results";
  }
  
 














$conn->close();
?>