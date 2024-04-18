<!DOCTYPE html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>

<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


  <?php
    $navbar_path = "tools/css.php";
for ($i = 0; $i < 9; $i++) {
    $path = str_repeat("../", $i) . $navbar_path;
    if (file_exists($path)) {
      include $path;
        break;
    }
} 


    ?>

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
}

    .message {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.message-content {
    border-radius: 10px;
    padding: 10px 20px;
    max-width: 70%;
    word-wrap: break-word;
}

.received {
    background-color: #DCF8C6;
    align-self: flex-start;
}

.sent {
    background-color: #E5E5EA;
    align-self: flex-end;
}

.message-content p {
    margin: 5px 0;
}

  </style>
</head>
<body class="rtl">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    
      
      
      
      
      
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
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">
              <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white">
                <div class="menu-bar">
                  <ul class="menu-items">
                    <li class="compose mb-3"><h1 class="btn btn-primary btn-block">تحديث</ا></li>
                    <li class="active"><a href="#"><i class="fa fa-envelope-open"></i> البريد الوارد </a><span class="badge badge-pill badge-success">8</span></li>
                  </ul>
                  <div class="wrapper">
                    <div class="online-status d-flex justify-content-between align-items-center">
                    <p class="chat">المقررات الحالية</p> </div>
                  </div>
                  <ul class="profile-list">
                    
<?PHP
                        // استعلام SQL لاسترداد بيانات معينة من الجدول
                        $sql = "select c.*, a.* ,s.subject_name , CONCAT(a.First_Name, ' ', a.Last_Name)  'full' from current_semester c 
                        inner join accounts a 
                        inner join subjects s 
                         where  c.Faculty_member_ID = a.Account_ID and c.Semester_Number = $_SESSION[Max_Semester_Number] and  c.subject_code = s.subject_code and c.student_id= $_SESSION[Account_ID]";
                        $result = $conn->query($sql);
                        // التحقق من وجود بيانات للعرض
                        if ($result->num_rows > 0) {
                            // عرض البيانات
                            while ($row = $result->fetch_assoc()) {
                        echo '<li class="profile-list-item"> <a href="'.$config['mail']."?id=".$row["Account_ID"]."&subject_code=".$row["subject_code"].'"> <span class="pro-pic"><img src="../assets/img/profile-img.png" alt=""></span><div class="user"><p class="u-name">'.$row["full"].'</p><p class="u-designation">'.$row["subject_name"]." - ".$row["subject_code"].'</p></div> </a></li>';
                            }
                        } else {
                            // إذا لم يتم العثور على بيانات
                            echo '<tr><td colspan="4">لا يوجد بيانات لعرضها</td></tr>';
                        }
?>
                    </ul>



                    <div class="wrapper">
                    <div class="online-status d-flex justify-content-between align-items-center">
                    <p class="chat">المرشد الاكاديمي</p> </div>
                  </div>
                  <ul class="profile-list">
                  <?php
// استعلام SQL لاسترداد بيانات معينة من الجدول
$sql2 = "select Faculty_member_ID from current_semester where student_id= $_SESSION[Account_ID]";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

if ($row2) {
    // الحصول على Faculty_member_ID فقط إذا كانت هناك نتائج
    $faculty_member_id = $row2['Faculty_member_ID'];

    // استعلام SQL لاسترداد بيانات من جدول accounts باستخدام Faculty_member_ID
    $sql = "select * , CONCAT(First_Name, ' ',Last_Name) AS 'full' from accounts where Account_ID = $faculty_member_id";
    $result = $conn->query($sql);

    // التحقق من وجود بيانات للعرض
    if ($result->num_rows > 0) {
        // عرض البيانات
        while ($row = $result->fetch_assoc()) {
            echo '<li class="profile-list-item"> <a href="'.$config['mail']."?id=".$row["Account_ID"]."&subject_code=Advisor".'"> <span class="pro-pic"><img src="../assets/img/profile-img.png" alt=""></span><div class="user"><p class="u-name">'.$row["full"].'</p><p class="u-designation">مرشد اكاديمي</p></div> </a></li>';
        }
    } else {
        // إذا لم يتم العثور على بيانات
        echo '<tr><td colspan="4">لا يوجد بيانات لعرضها</td></tr>';
    }
} else {
    // إذا لم يتم العثور على Faculty_member_ID
    echo '<tr><td colspan="4">لا يوجد بيانات لعرضها</td></tr>';
}
?>

                    </ul>
                </div>
              </div>

              <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">
                <div class="message-body">
                  <div class="sender-details">
                    <img class="img-sm rounded-circle mr-3" src="../assets/img/profile-img.png" alt="">
                    <div class="details">
                      <p class="msg-subject">
                      <?php 
                      if($_GET['subject_code']=="Advisor"){
                        //خاصه للمرشد الاكاديمي
                        $sql2 = "SELECT * , CONCAT(First_Name, ' ', Last_Name)  'full' FROM accounts WHERE Account_ID = {$_GET['id']}";
                        $result2 = $conn->query($sql2);
                        
                        // التحقق من وجود بيانات للعرض
                        if ($result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc();
                            echo $row2["full"];
                        } else {
                            // إذا لم يتم العثور على بيانات
                            echo 'لا يوجد بيانات لعرضها';
                        }
                        ?>
                          </p>
                          <p class="sender-email">
                            <?php 


                            echo "Advisor";
                      
                      }else{


                    $sql3 = "SELECT * , CONCAT(First_Name, ' ', Last_Name)  'full' FROM accounts WHERE Account_ID = {$_GET['id']}";
                    $result3 = $conn->query($sql3);
                    
                    // التحقق من وجود بيانات للعرض
                    if ($result3->num_rows > 0) {
                        $row3 = $result3->fetch_assoc();
                        echo $row3["full"];
                    } else {
                        // إذا لم يتم العثور على بيانات
                        echo 'لا يوجد بيانات لعرضها';
                    }
                    ?>
                      </p>
                      <p class="sender-email">
                        <?php 
$sql5 = "SELECT * FROM subjects WHERE subject_code = ?";
$stmt = $conn->prepare($sql5);
$stmt->bind_param("s", $_GET['subject_code']);
$stmt->execute();
$result5 = $stmt->get_result();

if ($result5->num_rows > 0) {
    $row5 = $result5->fetch_assoc();
    echo $row5["subject_name"] . " - " . $row5["subject_code"];
} else {
    // إذا لم يتم العثور على بيانات
    echo 'لا يوجد بيانات لعرضها';
}


                  }
                    ?>

                      </p>
                    </div>
                  </div>
                  <div class="message">
                    <br><br>
    <div class="message-content received">
        <p>Hi Emily,</p>
        <p>This week has been a great week and the team is right on schedule with the set deadline. The team has made great progress and achievements this week. At the current rate we will be able to deliver the product right on time and meet the quality that is expected of us. Attached are the seminar report held this week by our team and the final product design that needs your approval at the earliest.</p>
        <p>For the coming week the highest priority is given to the development for <a href="http://www.urbanui.com/" target="_blank">http://www.urbanui.com/</a> once the design is approved and necessary improvements are made.</p>
        <p>Regards,<br>Sarah Graves</p>
    </div>
    <div class="message-content sent">
        <p>Hi Sarah,</p>
        <p>Thanks for the update! It's great to hear that we're on track with our deadlines. I'll review the seminar report and product design promptly. Looking forward to the developments for next week.</p>
        <p>Best regards,<br>Emily</p>
    </div>
    <br><br>
</div>

<div class="attachments-sections">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Type your message here...">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">Send</button>
        </div>
    </div>
    <ul>
                    </ul>
                  </div>
                </div>
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
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


</body>















<?php
 download_js();
 print_js();
?>



  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- تضمين Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>
  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>







<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/rtl-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->
</html>
