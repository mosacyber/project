
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

// استعلام SQL لاسترداد البيانات
$sql = "SELECT * FROM accounts";

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





 






$currentPage = basename($_SERVER['PHP_SELF']);
// التحقق من كونها صفحة index
if ($currentPage === 'index.php') {
  $sql = "SELECT * FROM  greaaaaad";
  $result = $conn->query($sql);





  while($row = $result->fetch_assoc()) {

  

    
    echo "<tr>";
    echo "<td>" . $row["frist_name"] . "</td>";
    echo "<td>" . $row["dqh"] . "</td>";
    echo "<td>";
    echo "<div class='progress'>";
    if ($row["coupon"] < 50) {
        echo "<div class='progress-bar bg-danger' role='progressbar' style='width: " . $row["coupon"] . "%' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div>";
    } else if($row["coupon"] < 70){
        echo "<div class='progress-bar bg-warning' role='progressbar' style='width: " . $row["coupon"] . "%' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div>";
    }else if($row["coupon"] < 100){
      echo "<div class='progress-bar bg-success' role='progressbar' style='width: " . $row["coupon"] . "%' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div>";
    }else{
      echo "<div class='progress-bar bg-primary' role='progressbar' style='width: " . $row["coupon"] . "%' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100'></div>";

    }
    echo "</div>";
    echo "</td>";
    echo "<td>" . $row["coupon"] . "</td>";
    echo "<td>" . $row["copy"] . "</td>";
    echo "</tr>";
    
  }



}else if ($currentPage === 'Student2.php') {

  $sql = "SELECT * FROM accounts";
  $result = $conn->query($sql);

  echo "<div class='row'>";
  while($row = $result->fetch_assoc()) {
    echo "<div class='card col-3'>";
    echo "  <div class='card-body'>";
    echo "    <h5 class='card-title'>" . $row["First_Name"] . " " . $row["Last_Name"] . "</h5>";
    echo "    <p class='card-text'>" . $row["Account_ID"] . "</p>";
    echo "    <p class='card-text'><small class='text-muted'>" . $row["Email"] . "</small></p>";
    echo " <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#filterModal'><i class='bi bi-info-circle'>  </i>معلومات</button>";
    echo "  </div>";
    echo "</div>";
  }

  echo "</div>"; // إغلاق الصف row
}else{
  if ($result->num_rows > 0) {
    // إخراج البيانات بشكل جدول
    echo "<table class='table datatable'>";
    echo "<thead><tr><th>First_Name</th><th>First_Name</th><th>Last_Name</th><th>Email</th><th>المنصب</th></tr></thead>";
    echo "<tbody>";
    // إخراج البيانات في كل صف
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["First_Name"] . "</td>";
      echo "<td>" . $row["First_Name"] . "</td>";
      echo "<td>" . $row["Last_Name"] . "</td>";
      echo "<td>" . $row["Email"] . "</td>";
      echo "<td>" . $row["Position"] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  } else {
    echo "0 results";
  }
  
 }














$conn->close();
?>