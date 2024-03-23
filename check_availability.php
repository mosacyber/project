<?php
include 'db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountID = $_POST['account_id'];

    $query = "SELECT * FROM accounts WHERE Account_ID = '$accountID'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo json_encode(['available' => false]);
    } else {
        echo json_encode(['available' => true]);
    }
} else {
    echo json_encode(['available' => false, 'message' => 'Invalid Request']);
}
?>
