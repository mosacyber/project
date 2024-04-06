<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/email.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:09 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/stylee.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <style>
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

<body class="sidebar-icon-only sidebar-fixed">
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
                    <li class="compose mb-3"><button class="btn btn-primary btn-block">Compose</button></li>
                    <li class="active"><a href="#"><i class="fa fa-envelope-open"></i> Inbox</a><span class="badge badge-pill badge-success">8</span></li>
                    <li><a href="#"><i class="fas fa-trash"></i> Trash</a></li>
                  </ul>
                  <div class="wrapper">
                    <div class="online-status d-flex justify-content-between align-items-center">
                    <p class="chat">المحادثات</p> <span class="status offline online"></span></div>
                  </div>
                  <ul class="profile-list">
<?PHP
                        // استعلام SQL لاسترداد بيانات معينة من الجدول
                        $sql = "select c.*, a.* ,s.subject_name , CONCAT(a.First_Name, ' ', a.Last_Name)  'full' from current_semester c 

                        inner join accounts a 
                        inner join subjects s 
                        
                         where  c.Faculty_member_ID = a.Account_ID and c.Semester_Number = 451 and  c.subject_code = s.subject_code and c.student_id= $_SESSION[Account_ID]";
                        $result = $conn->query($sql);

                        // التحقق من وجود بيانات للعرض
                        if ($result->num_rows > 0) {
                            // عرض البيانات
                            while ($row = $result->fetch_assoc()) {
                        echo '<li class="profile-list-item"> <a href="'.$config['mail']."?id=".$row["Account_ID"]."&subject_code=".$row["subject_code"].'"> <span class="pro-pic"><img src="../assets/img/profile-img.png" alt=""></span><div class="user"><p class="u-name">'.$row["full"].'</p><p class="u-designation">'.$row["subject_name"].'</p></div> </a></li>';
                            }
                        } else {
                            // إذا لم يتم العثور على بيانات
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
                    $sql5 = "SELECT * FROM subjects WHERE subject_code = {$_GET['subject_code']}";
                    $result5 = $conn->query($sql5);
                    
                    // التحقق من وجود بيانات للعرض
                    if ($result5->num_rows > 0) {
                        $row5 = $result5->fetch_assoc();
                        echo $row5["subject_name"];
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/email.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:23 GMT -->
</html>
