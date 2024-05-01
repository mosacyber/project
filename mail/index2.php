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
              
              
            <?php 
              if($_SESSION['role'] == 1){
                echo" </ul>
                <div class='wrapper'>
                  <div class='online-status d-flex justify-content-between align-items-center'>
                  <p class='chat'>المقررات الحالية</p> </div>
                </div>
                <ul class='profile-list'>";
              }
                        // استعلام SQL لاسترداد بيانات معينة من الجدول
              $sql = "SELECT c.*, a.*, s.subject_name, CONCAT(a.First_Name, ' ', a.Last_Name) AS full
              FROM current_semester c
              INNER JOIN accounts a ON c.Faculty_member_ID = a.Account_ID
              INNER JOIN subjects s ON c.subject_code = s.subject_code
              WHERE c.Semester_Number = '{$_SESSION['Max_Semester_Number']}'";
                $role = "";
                if ($_SESSION['role'] == '1') {
                    $sql .= " AND c.student_id = '{$_SESSION['Account_ID']}'";
                    $role = "المرشد الأكاديمي";
                } else {
                  $sql .= " AND c.Faculty_member_ID = '{$_SESSION['Account_ID']}'";
                  $role ="الطلاب";
                }
                        $result = $conn->query($sql);
                        // التحقق من وجود بيانات للعرض
                        if ($result->num_rows > 0) {
                            // عرض البيانات
                            while ($row = $result->fetch_assoc()) {
                        echo '<li class="profile-list-item"> <a href="'.$config['mail']."?id=".$row["Account_ID"]."&subject_code=".$row["subject_code"].'"> <span class="pro-pic"><img src="../assets/img/profile-img.png" alt=""></span><div class="user"><p class="u-name">'.$row["full"].'</p><p class="u-designation">'.$row["subject_name"]." - ".$row["subject_code"].'</p></div> </a></li>';
                            }
                        } 

            ?>
                    </ul>



                    <div class="wrapper">
                    <div class="online-status d-flex justify-content-between align-items-center">
                    <p class="chat"><?php echo $role; ?></p> </div>
                  </div>
                  <ul class="profile-list">
      <?php
            // استعلام SQL لاسترداد بيانات معينة من الجدول
            $sql2 = "";
            if ($_SESSION['role'] == '1') {
              $sql2 .= "SELECT Faculty_member_ID FROM current_semester WHERE student_id = '{$_SESSION['Account_ID']}'";
            }else {
              $sql2 .= "SELECT student_id FROM current_semester WHERE Faculty_member_ID = '{$_SESSION['Account_ID']}'";
            }
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
    
                if ($result2->num_rows > 0) {
                  $Pos = '';
                  if($_SESSION['role'] == 1){
                    $Pos = 'مرشد أكاديمي'; 
                }
                else{
                  $Pos = 'طالب';
                  }
                  // تخزين القيم المحصل عليها في مصفوفة مؤقتة
                  $faculty_member_ids = [];
                  while ($row2 = $result2->fetch_assoc()) {
                      if ($_SESSION['role'] == '1') {
                          $faculty_member_ids[] = $row2["Faculty_member_ID"];
                      } else {
                          $faculty_member_ids[] = $row2["student_id"];
                      }
                  }
                  foreach ($faculty_member_ids as $faculty_member_id) {
                      $sql3 = "";
                    // استعلام SQL لاسترداد بيانات المرشد الأكاديمي باستخدام Faculty_member_ID
                    if ($_SESSION['role'] == 1) {
                    $sql3 .= "SELECT DISTINCT a.* , CONCAT(First_Name, ' ', Last_Name) AS 'full' FROM accounts a 
                    JOIN current_semester s ON  s.Faculty_member_ID = a.Account_ID 
                    WHERE s.Faculty_member_ID = $faculty_member_id AND s.student_id = '{$_SESSION['Account_ID']}'";
                    }else {
                      $sql3 .= "SELECT DISTINCT a.*, CONCAT(First_Name, ' ', Last_Name) AS 'full' 
                      FROM accounts a 
                      JOIN current_semester s ON s.student_id = a.Account_ID 
                      WHERE s.Faculty_member_ID = '{$_SESSION['Account_ID']}'";
                    }
                  }
                    $result3 = $conn->query($sql3);
                
                    // التحقق من وجود بيانات للعرض
                    if ($result3->num_rows > 0) {
                        // عرض البيانات
                        while ($row3 = $result3->fetch_assoc()) {
                            echo '<li class="profile-list-item"> <a href="'.$config['mail']."?id=".$row3["Account_ID"]."&subject_code=Advisor".'"> <span class="pro-pic"><img src="../assets/img/profile-img.png" alt=""></span><div class="user"><p class="u-name">'.$row3["full"].'</p><p class="u-designation">'.$Pos.'</p></div> </a></li>';
                                                   
                          }
                    } else {
                        // إذا لم يتم العثور على بيانات
                        echo "
                        <div class='alert alert-danger'>
                        تنبيه
                        <hr>
                        <tr><td colspan='4'>لا يوجد بيانات لعرضها</td></tr></div>";
                    }
                } 
                
            ?>
              </ul></div></div>

              <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">
                <div class="message-body">
                  <div class="sender-details">
                    <img class="img-sm rounded-circle mr-3" src="../assets/img/profile-img.png" alt="">
                    <div class="details">
                      <p class="msg-subject">
                      <?php 
                      if($_GET['subject_code']=="Advisor"){
                        //خاصه للمرشد الاكاديمي
                        $sql2 = "SELECT * , CONCAT(First_Name, ' ', Last_Name)  'full' FROM accounts WHERE Account_ID = (select Academic_Advisor_ID from academic_advisor_for_student where student_id ='{$_SESSION['Account_ID']}' )";
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
                    echo $Pos;
                      
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
                    } } ?>
                  </p></div></div>

            <?php
              function sendMessage($senderId, $recipientId, $message) {
                if (!is_dir('messages')) {
                    mkdir('messages');
                }

                $filePath = "messages/{$recipientId}.json";
                $messages = [];

                if (file_exists($filePath)) {
                    $messages = json_decode(file_get_contents($filePath), true);
                }

                $newMessage = [
                    'sender' => $senderId,
                    'recipient' => $recipientId,
                    'timestamp' => time(),
                    'content' => $message
                ];
                $messages[] = $newMessage;

                file_put_contents($filePath, json_encode($messages));
              }

              function getMessages($recipientId) {
                $filePath = "messages/{$recipientId}.json";
                $messages = [];

                if (file_exists($filePath)) {
                    $messages = json_decode(file_get_contents($filePath), true);
                }

                return $messages;
              }
              function getReceivedMessages($recipientId) {
                $filePath = "messages/{$recipientId}.json";
                $messages = [];

                if (file_exists($filePath)) {
                  $allMessages = json_decode(file_get_contents($filePath), true);

                  foreach ($allMessages as $message) {
                    if ($message['recipient'] == $recipientId && $message['sender'] != $recipientId) {
                      $messages[] = $message;
                    }
                  }
                }

                return $messages;
              }
              // تحميل الرسائل عند بدء تشغيل الصفحة
              if (isset($_GET['id'])) {
                $recipientId = $_GET['id'];
                $messages = getMessages($recipientId);
              }

              if (isset($_SESSION['Account_ID']) && isset($_POST['send_message'])) {
                $senderId = $_SESSION['Account_ID'];
                $recipientId = $_GET['id'];
                $message = $_POST['message_contents'];

                sendMessage($senderId, $recipientId, $message);

                // إعادة تحميل الرسائل بعد إرسال رسالة جديدة
                $messages = getMessages($recipientId);  
              }
              $receivedMessages = getReceivedMessages($_SESSION['Account_ID']);
              $allMessages = array_merge($receivedMessages, $messages);
              usort($allMessages, function($a, $b) {
                return $a['timestamp'] - $b['timestamp'];
              });
              ?>

                  <div class="message">
                    <br><br>
                    <?php foreach ($allMessages as $message): ?>
                      <?php if ($message['sender'] == $_GET['id']): ?>
                        <div class="message-content received">
                          <p><?php echo $message['content']; ?></p>
                          <p><?php echo date('H:i', $message['timestamp']); ?></p>
                        </div>
                      <?php elseif($message['sender'] == $_SESSION['Account_ID']): ?>
                        <div class="message-content sent">
                          <p><?php echo $message['content']; ?></p>
                          <p><?php echo date('H:i', $message['timestamp']); ?></p>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <br><br>
                  </div>

                  <div class="attachments-sections">
                        <form method="POST">
                          <div class="input-group" style="margin-buttun: 0;">
                              <input type="text" class="form-control" name="message_contents" placeholder="أدخل رسالتك هنا..." />
                              <div class="input-group-append">
                                  <button class="btn btn-primary" type="submit" name="send_message">Send</button>
                          </div>
                          </div>
                    </form>
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
