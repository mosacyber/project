<?php include './db/dbms.php';  ?>
<?php

 

$errors = [];

switch ($_GET['action']) {
    case "sign":
        // Validation checks
        if (empty($_POST['Account_ID']) && !ctype_digit($_POST['Account_ID']) && strlen($_POST['Account_ID']) !== 9) {
            $errors[] = "يرجى إدخال رقم جامعي صحيح يتكون من 9 أرقام";
            
            // إضافة تحقق إضافي لطباعة القيمة المرسلة
            echo 'القيمة المرسلة: ';
            var_dump($_POST['Account_ID']);
        }
        if (empty($_POST['First_Name'])) {
            $errors[] = "يرجى إدخال الاسم الأول";
        }
        if (empty($_POST['Last_Name'])) {
            $errors[] = "يرجى إدخال الاسم الاخير";
        }
        if (empty($_POST['Email'])) {
            $errors[] = "يرجى إدخال  الايميل";
        }
        if (empty($_POST['Password'])) {
            $errors[] = "يرجى إدخال  كلمة السر";
        }if (empty($_POST['Mobile'])) {
            $errors[] = "يرجى إدخال رقم الهاتف ";
        }if (empty($_POST['Position'])) {
            $errors[] = "يرجى إدخال المنصب ";
        }
        // Add more validation checks as needed...

        if (empty($errors)) {
            // Check if the ID already exists
            $existingUser = $db->prepare("SELECT * FROM accounts WHERE Account_ID = :Account_ID");
            $existingUser->execute([':Account_ID' => $_POST['Account_ID']]);
            $userExists = $existingUser->fetch();

            if ($userExists) {
                $errors[] = "الرقم الجامعي موجود بالفعل في قاعدة البيانات";
            } else {
                // Hash the password
                $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

                // Insert data into the database
                $sql = $db->prepare("INSERT INTO accounts (Account_ID, First_Name, Last_Name, Email, Password, Mobile, Position, Admin_ID) 
                                     VALUES (:Account_ID, :First_Name, :Last_Name, :Email, :Password, :Mobile, :Position, :Admin_ID)");

                $sql->execute([
                    ":Account_ID" => $_POST['Account_ID'],
                    ":First_Name" => $_POST['First_Name'],
                    ":Last_Name" => $_POST['Last_Name'],
                    ":Email" => $_POST['Email'],
                    ":Password" => $Password,
                    ":Mobile" => $_POST['Mobile'],
                    ":Position" => $_POST['Position'],
                    ":Admin_ID" => "1",
                ]);

                echo '<div class="alert alert-success">تم إضافة البيانات بنجاح!</div>';
            }
        }

        if (!empty($errors)) {
            // Display error messages
            echo '<div class="alert alert-danger">' . implode('<br>', $errors) . '</div>';
        }

        break;
    default:
        echo "Invalid action";
}

?>
