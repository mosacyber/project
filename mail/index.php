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
  <link rel="stylesheet" href="../style.css">
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
                    <p class="chat">المقررات الحالية</p> <span class="status offline online"></span></div>
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



                    <div class="wrapper">
                    <div class="online-status d-flex justify-content-between align-items-center">
                    <p class="chat">المرشد الاكاديمي</p> <span class="status offline online"></span></div>
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
