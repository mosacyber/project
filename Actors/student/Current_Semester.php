
<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>المقررات المسجلة</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <?php
    $navbar_path = "tools/css.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}?>
  <style>
    <?php
    $navbar_path = "tools/tools.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
    download_css();
    print_css();
    ?>

.table thead th, .jsgrid .jsgrid-table thead th {
    border-top: 0;
    border-bottom-width: 1px;
    font-weight: bold;
    font-size: 1rem;
    background-color: #392e6e;
    color: #fff;
}<?php 
$navbar_path = "loading/loading.css";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?> 
</style>
</head>
<body class="rtl">
  <div class="container-scroller">
<?php
$navbar_path = "Navbar/rtl/nav.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
$loading_path = "loading/loading.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $loading_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">
<?php
$loading_path = "content/content.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $loading_path;
    if (file_exists($path)) {
        include $path;
        break;
    }
}
?>
          </div>  
          <br><br>
          <div class="page-header">
            <h3 class="page-title">
المقررات المسجلة
            </h3>
          </div>

          <div class="row">
        <div class="col-xxl-12 col-md-12">
  <div class="card info-card sales-card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
          <?php

$sql = "SELECT a.Account_ID, c.subject_code, c.Semester_Number, s.subject_name, s.credit_hours, CONCAT(a2.First_Name, ' ', a2.Last_Name) AS Faculty_Name
FROM current_semester c
INNER JOIN accounts a ON a.Account_ID = c.student_id 
INNER JOIN accounts a2 ON a2.Account_ID = c.Faculty_member_ID
INNER JOIN subjects s ON c.subject_code = s.subject_code
WHERE c.student_id = $_SESSION[Account_ID]
AND c.Semester_Number = (SELECT MAX(Semester_Number) FROM current_semester WHERE student_id = $_SESSION[Account_ID])
ORDER BY c.Semester_Number DESC;";

$result = $conn->query($sql);


if ($result) {

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        $semester_number = $row["Semester_Number"];
        $last_digit = substr($semester_number, -1);
        $semester_name = "";

        switch ($last_digit) {
            case "1":
                $semester_name = "الأول";
                break;
            case "2":
                $semester_name = "الثاني";
                break;
            case "3":
                $semester_name = "الثالث";
                break;
            default:
                $semester_name = "غير محدد";
                break;
        }
        echo '<h4>الفصل الدراسي : <span>'.$semester_name.'</span></h4>';

        $academic_year = substr($semester_number, 0, 2);
        echo '<h4>العام الدراسي : 14'.$academic_year.'هـ</span></h4>';
    } else {
        echo '<div class="alert alert-danger">تنبيه: لا توجد بيانات لعرضها.</div>';
    }
} else {
    echo '<div class="alert alert-danger">تنبيه: فشل في استعلام قاعدة البيانات.</div>';
}

             ?>
            <tr>
              <th scope="col">رمز المقرر</th>
              <th scope="col">اسم المقرر</th>
              <th scope="col">الساعات</th>
              <th scope="col">المحاضر</th>
            </tr>
          </thead>
          <tbody>
          <?php
           if(isset($_SESSION['Account_ID'])) {
                        $sql = "SELECT a.Account_ID, c.subject_code, c.Semester_Number, s.subject_name, s.credit_hours, CONCAT(a2.First_Name, ' ', a2.Last_Name) AS Faculty_Name
                            FROM current_semester c
                            INNER JOIN accounts a ON a.Account_ID = c.student_id 
                            INNER JOIN accounts a2 ON a2.Account_ID = c.Faculty_member_ID
                            INNER JOIN subjects s ON c.subject_code = s.subject_code
                            WHERE c.student_id = {$_SESSION['Account_ID']}
                            AND c.Semester_Number = (SELECT MAX(Semester_Number) FROM current_semester WHERE student_id = {$_SESSION['Account_ID']})
                            ORDER BY c.Semester_Number DESC;";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["subject_code"] . '</td>';
                                echo '<td>' . $row["subject_name"] . '</td>';
                                echo '<td>' . $row["credit_hours"] . '</td>';
                                echo '<td>د. ' . $row["Faculty_Name"] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                     
                            echo '<tr><td colspan="4">لا يوجد بيانات لعرضها</td></tr>';
                        }
                      }else {
                          echo"
                          <div class='alert alert-danger'>
                          تنبيه
                          <hr> 
                              <p>
                        هناك مشكله في السشن
                              </p>
                        </div>";
                        }
                        ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<h1></h1>
        <div class="col-xxl-12 col-md-12">
  <div class="card info-card sales-card">
    <div class="card-body">
      <div class="table-responsive">

<?php


  if(isset($_SESSION['Account_ID'])) {
$sql = "SELECT  a.Account_ID, c.subject_code, c.Semester_Number, s.subject_name, s.credit_hours, CONCAT(a2.First_Name, ' ', a2.Last_Name) AS Faculty_Name
FROM current_semester c
INNER JOIN accounts a ON a.Account_ID = c.student_id 
INNER JOIN accounts a2 ON a2.Account_ID = c.Faculty_member_ID
INNER JOIN subjects s ON c.subject_code = s.subject_code
WHERE c.student_id = {$_SESSION['Account_ID']}
ORDER BY c.Semester_Number DESC
LIMIT 1;";
 

  $sql4 = " SELECT * from academic_advisor_for_student WHERE student_id = 421004034 LIMIT 1";
  $result4 = $conn->query($sql4);
  $row4 = $result4->fetch_assoc();

// تنفيذ الاستعلام
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // عرض البيانات
  while($row = $result->fetch_assoc()) {
  
    $result_accounts = $conn->query($sql);

    if ($result_accounts->num_rows > 0) {
     
      while($row_accounts = $result_accounts->fetch_assoc()) { 
          echo "<h2>اسم المشرف الاكاديمي : د. " . $row_accounts["Faculty_Name"] . "</h2><br>";
          echo '<a href="'.$config['mail']."?id=".$row4["Academic_Advisor_ID"]."&subject_code="."Advisor".'"><button type="button" class="btn btn-primary">تواصل</button></a>';
      }    
  }
     else {
      echo "No account found";
    }
  }
} else {
  echo"
  <div class='alert alert-danger'>
  تنبيه
  <hr>
      <p>لا يوجد لديك مشرف اكاديمي</p>
</div>";
}
} else {
  echo"
  <div class='alert alert-danger'>
  تنبيه
  <hr>
      <p>
هناك مشكله في السشن
      </p>
</div>";
}
$conn->close();
?>

      </div>
    </div>
  </div>
</div>
<h1></h1>
          </div>    
        </div>
      </div>
    </div>
       

        
<?php
$navbar_path = "footer/Footer.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
}
?>
      </div>
    </div>
  </div>
</body>
<?php
download_js();
print_js();
?>
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php
$navbar_path = "tools/js.php";

for ($i = 0; $i < 9; $i++) {
  $path = str_repeat("../", $i) . $navbar_path;
  if (file_exists($path)) {
    include $path;
    break;
  }
}
?>

</html>
