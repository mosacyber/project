
<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "university_info"; 

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$text ="where Position = 3";
$none="";


$ok = "";

$sql = "SELECT * FROM accounts $ok";

if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
  if ($filter == 'accountID43') {
    $sql .= " WHERE Account_ID = 43"; 
  } elseif ($filter == 'allData') {
  }
}

$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table class='table datatable'>";
    echo "<thead><tr><th>Account_ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Position</th></tr></thead>";
    echo "<tbody>";
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