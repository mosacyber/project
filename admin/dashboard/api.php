<?php include '../../db/dbms.php';  ?>
<?php



$errors = [];
function displayMessage($message, $type = 'success') {
    echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
}
switch ($_GET['action']) {
        case "sign":
        // Validation checks
         if (empty($_POST['Account_ID']) && !ctype_digit($_POST['Account_ID']) && strlen($_POST['Account_ID']) !== 9) {
            $errors[] = "يرجى إدخال رقم جامعي صحيح يتكون من 9 أرقام";
        }
        if (empty($_POST['First_Name'])) {
            $errors[] = "يرجى إدخال الاسم الأول";
        }
        if (empty($_POST['Last_Name'])) {
            $errors[] = "يرجى إدخال الاسم الاخير";
        }
        if (empty($_POST['Email']) || !filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "يرجى إدخال عنوان بريد إلكتروني صحيح";
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

        
            // ... أقسام أخرى هنا ...
        
           
        
        
        
        

        case "edit":
            $Account_ID = $_GET['Account_ID'];
            $sql = $db->prepare("SELECT * FROM accounts WHERE Account_ID = :Account_ID");
            $sql->execute([
                ":Account_ID" => $Account_ID
            ]);
        
            // استرجاع البيانات
            $row = $sql->fetch(PDO::FETCH_ASSOC);
        
            // إذا كنت تريد تحديث بيانات المستخدم المسترجعة في النموذج
            // يمكنك استخدام هذه القيم لتعبئة الحقول في النموذج
        
            // $First_Name = $row['First_Name'];
            // $Last_Name = $row['Last_Name'];
            // $Email = $row['Email'];
            // $Mobile = $row['Mobile'];
            // $Position = $row['Position'];
        
            // ربما يكون لديك نموذج HTML هنا يعبأ بقيم البيانات
        
            header("HX-trigger: edit");
            echo '
<form action="./api.php?action=save_edit&Account_ID=' . $Account_ID . '" method="post">
    <table class="table table-bordered" border="1">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">الاسم الاول</th>
                <th scope="col">الاسم الاخير</th>
                <th scope="col">الرقم الجامعي</th>
                <th scope="col">الايميل</th>
                <th scope="col">رقم الجوال</th>
                <th scope="col">المنصب</th>
                <th scope="col">حفظ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $row['Account_ID'] . '</td>
                <td contenteditable="true" name="First_Name">' . $row['First_Name'] . '</td>
                <td contenteditable="true" name="Last_Name">' . $row['Last_Name'] . '</td>
                <td contenteditable="true" name="Account_ID">' . $row['Account_ID'] . '</td>
                <td contenteditable="true" name="Email">' . $row['Email'] . '</td>
                <td contenteditable="true" name="Mobile">' . $row['Mobile'] . '</td>
                <td contenteditable="true" name="Position">' . $row['Position'] . '</td>
                <td>
                   
                    <!-- زر الحفظ يقوم بإرسال النموذج -->
                   <!-- <button type="submit" class="btn btn-success btn-sm" hx-post="./api.php?action=save_edit&Account_ID=' . $row['Account_ID'] . '" hx-swap="outerHTML">حفظ</button> -->
                   <input type="submit" class="form-control" value="تحديث" name="update" />
                                    </td>
            </tr>
        </tbody>
    </table>
</form>
';
break;
        


case "save_edit":


    $Account_ID = $_GET['Account_ID']; // Assuming you are passing it as a URL parameter

    // Assuming the fields are named correctly in your HTML form
    $First_Name = isset($_POST['First_Name']) ? $_POST['First_Name'] : '';
    $Last_Name = isset($_POST['Last_Name']) ? $_POST['Last_Name'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $Mobile = isset($_POST['Mobile']) ? $_POST['Mobile'] : '';
    $Position = isset($_POST['Position']) ? $_POST['Position'] : '';

    // Update the record in the database
    $sql = $db->prepare("UPDATE accounts SET 
    First_Name = :First_Name,
    Last_Name = :Last_Name,
    Email = :Email,
    Mobile = :Mobile,
    Position = :Position
 WHERE Account_ID = :Account_ID");

$sql->execute([
":First_Name" => $First_Name,
":Last_Name" => $Last_Name,
":Email" => $Email,
":Mobile" => $Mobile,
":Position" => $Position,
":Account_ID" => $Account_ID
]);

// Fetch the updated data
$updatedRecord = $db->prepare("SELECT * FROM accounts WHERE Account_ID = :Account_ID");
$updatedRecord->execute([':Account_ID' => $Account_ID]);
$updatedData = $updatedRecord->fetch(PDO::FETCH_ASSOC);

// Send the updated data back to the client as JSON

    break;







    case "get_data":
    // Fetch data from the database
    $query = "SELECT * FROM accounts";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Output the data
    echo '<table class="table table-bordered" border="1" hx-swap="outerHTML" hx-target=".table">';
    echo '<thead>
            <tr>
                <th scope="col">الرقم الجامعي</th>
                <th scope="col">الاسم الأول</th>
                <th scope="col">الاسم الاخير</th>
                <th scope="col">الايميل</th>
                <th scope="col">العمليات</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($result as $row) {
            echo '<tr>
                    <td>' . $row['Account_ID'] . '</td>
                    <td>' . $row['First_Name'] . '</td>
                    <td>' . $row['Last_Name'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>
                        <button hx-trigger="click" hx-delete="./api.php?action=delete&Account_ID=' . $row['Account_ID'] . '" hx-swap="outerHTML" class="btn btn-danger btn-sm">حذف</button>
                    </td>
                </tr>';
        }

        echo '</tbody></table>';
        break;


        




        case "delete":
            header("HX-trigger: deleted");
            $Account_ID = $_GET['Account_ID'];
            $sql = $db->prepare("DELETE FROM accounts WHERE Account_ID = :Account_ID");
            $sql->execute([
                ":Account_ID" => $Account_ID
            ]);
        
            // Check the number of affected rows
            $rowCount = $sql->rowCount();
            if ($rowCount > 0) {
                displayMessage('تم حذف الحساب بنجاح!', 'success');
            echo' <script>setTimeout(function () { window.location.href = "accounts.php"; }, 500);</script>';
            } else {
                displayMessage('فشلت عملية الحذف، قد لا يكون الحساب موجودًا!', 'danger');
            }

            break;
        
        
        
    
        default:
            echo "Invalid action";
    }
    ?>
