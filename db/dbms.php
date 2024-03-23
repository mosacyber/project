
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=university_info", "root", "");
    // تعيين خيارات PDO للإعلام عن الأخطاء بشكل صارم
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to connect to the database: " . $e->getMessage();
    exit;
}

?>
