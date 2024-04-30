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













/* للجدول  */
.datatable-table > thead > tr > th {
    vertical-align: bottom;
    text-align: right;
    border-bottom: 1px solid #d9d9d9;
}











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
?>


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">

          </div>


          <div class="row">
            




        <!-- Revenue Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php
if (isset($_SESSION['role'])) {
// استعلام SQL لاسترداد البيانات من جدول faculty_member



$sql_program = "SELECT * FROM program_coordinator WHERE Program_Coordinator_ID = $_SESSION[Account_ID]";
$result_program = $conn->query($sql_program);
$row_program = $result_program->fetch_assoc();
$Program_ID = $row_program['Program_ID'];

$sql = "SELECT * FROM faculty_member WHERE Faculty_member_ID = $_SESSION[Account_ID]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $sql2 = "SELECT * FROM departments WHERE Department_ID =  $row[Department_ID]";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();

        $firstDigit = substr($row['Department_ID'], 0, 1);

        $sql3 = "SELECT * FROM colleges WHERE College_ID =  $firstDigit";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_assoc();

            $sql4 = "SELECT * FROM students WHERE student_id = '{$_SESSION['Account_ID']}'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                // بيانات الطالب موجودة ويمكن معالجتها هنا
            } else {

            }
        } else {
            echo "لا يوجد بيانات كلية";
        }
    } else {
        echo "
        <div class='alert alert-danger'>
        تنبيه
        <hr>
            <p>لا يوجد بيانات قسم</p>
    </div>";
    }
} else {
  echo "
    <div class='alert alert-danger'>
    تنبيه
    <hr>
        <p>لا يوجد بيانات عضو هيئة تدريس</p>
</div>";
}

    
    
    // تحديد التخصص والدرجة العلمية استنادًا إلى قيمة $_SESSION['role']
    switch ($_SESSION['role']) {
        case '1':
            $Specialization = "";
            $Degree = "طالب";


            $Major = $row4['Program_ID']; 

            break;
        case '2':
            $Specialization = "عميد الكلية";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            
            break;
        case '3':
            $Specialization = "منسق البرنامج";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            
            break;
        case '4':
            $Specialization = "المرشد الاكاديمي";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case '8':
            $Specialization = "عضو هيئة التدريس";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case '6':
            $Specialization = "وكيل شؤون الطلاب التعليمية";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case '7':
            $Specialization = "مدير الجامعة";
            $Degree = isset($row['Academic_Rank']) ? $row['Academic_Rank'] : "";
            $departments = isset($row2['Department_Name']) ? $row2['Department_Name'] : "";
            $college = isset($row3['College_Name']) ? $row3['College_Name'] : "";
            $Major = isset($row['Major']) ? $row['Major'] : "";
            break;
        case 'admin':
            // تعيين التخصص لحالة الادمن هنا
            break;
        default:
            // تعيين التخصص الافتراضي هنا في حالة عدم تطابق أي من الحالات السابقة
            break;
    }
}
?>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الوظيفي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>


<div class="row">
    <div class="col-lg-3 col-md-4 label">التخصص</div>
    <div class="col-lg-9 col-md-8"><?php echo  $Major  ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">الدرجه العلميه</div>
    <div class="col-lg-9 col-md-8"><?php echo $Degree ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">القسم</div>
    <div class="col-lg-9 col-md-8"><?php echo $departments ?></div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">الكليه</div>
    <div class="col-lg-9 col-md-8"><?php echo $college ?></div>
</div>


          </div>
       
       
       
       


        </div>
        </div>
        </div>





          </div><br>
          <div class="col-lg-12">


<div class="card">
    <div class="card-body">
        <h4 class="card-title">هنا من متى صار منسق يظهر وعلى اي برنامج</h4>
<?php
$sql_program = "SELECT * FROM programs WHERE Program_ID = $Program_ID";
$result_program = $conn->query($sql_program);
$row_program = $result_program->fetch_assoc();
$Program_Name = $row_program['Program_Name'];



?>
             <h4 class="card-title">البرنامج : <?php  echo $Program_Name   ?></h4>
   
    </div>
</div>



</div><br>
        <!-- content-wrapper ends -->
        <div class="col-lg-12">


            <div class="card">
                <div class="card-body">
                <form action="edit_subject.php" method="post">
    <?php
    $sql = "SELECT * FROM subjects where Program_ID = $Program_ID";
    $result = $conn->query($sql);
    ?>

    <?php if ($result->num_rows > 0): ?>
        <table class='table datatable' dir='rtl' style='text-align: right'>
            <thead>
                <tr>
                    <th>رمز المقرر</th>
                    <th>اسم المقرر</th>
                    <th>عدد الساعات</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["subject_code"] ?></td>
                        <td><?= $row["subject_name"] ?></td>
                        <td><?= $row["credit_hours"] ?></td>
                        <>
                        <a class='btn btn-warning' data-toggle='modal' data-target='#editModal'>تعديل</a>
</td>

                        <td>
                            <button type="button" class="btn btn-danger deletBtn">
                                حذف
                            </button></td>
                    </tr>
                <?php endwhile; 
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                ?>



















                
            </tbody>
        </table>
    <?php else: ?>
        <p>لا توجد بيانات متاحة</p>
    <?php endif; ?>
</form>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl;">
                <h5 class="modal-title" id="editModalLabel">تعديل</h5>
                <button type="button" class="close-left btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="popup-form" id="popupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Esubject" class="form-label">اسم المقرر</label>
                                <input type="text" class="form-control" id="Esubject" name="Esubject" value="" readonly/>
                            </div>
                            
                        </div>
                    </div>
                    <br /> <br />
                    <button class="btn btn-primary" id="Ebtn">حفظ التغييرات</button>
                    <button class="btn btn-secondary" id="closeForm" data-dismiss="modal">إلغاء</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).on('click', '#Ebtn', function(){
    var subjectCode = $('#Esubject').val();
    $.ajax({
        url: 'update_data.php',
        type: 'POST',
        data: {
            subjectCode: subjectCode
        },
        success: function(response) {
            console.log(response);
            $('#editModal').modal('hide');
            $('#OKModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>











                </div>
            </div>



        </div>
       
       




        </div>
        <!-- content-wrapper ends -->

        






















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
  <!-- container-scroller -->

</body>


<?php
// Download and print JavaScript functions (presumably defined elsewhere)
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

// Search for navbar.php in parent directories
for ($i = 0; $i < 9; $i++) {
  $path = str_repeat("../", $i) . $navbar_path;
  if (file_exists($path)) {
    include $path;
    break;
  }
}
?>

</html>