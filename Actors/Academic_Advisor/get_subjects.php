<?php 
$navbar_path = "Navbar/rtl/nav.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?>
<?php
$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $subjects = array();

    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }

    echo json_encode($subjects);
} else {
    echo json_encode(array('message' => 'لا يوجد بيانات'));
}

$conn->close();
?>
