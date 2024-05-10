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
    footer_css()

    ?>

.table thead th, .jsgrid .jsgrid-table thead th {
    border-top: 0;
    border-bottom-width: 1px;
    font-weight: bold;
    font-size: 1rem;
    background-color: #392e6e;
    color: #fff;
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


      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="raw">
        <!-- Revenue Card -->
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الوظيفي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>
                  </div>
        </div>
        </div>
        </div>


          </div><br>

<div class="col-md-12">
    <div class="row">



        <div class="col-lg-12 ">
            <div class="card"><!--  academic_record اعلى سمستر -->
            <div class="card-body">
                <a href="add.php"><button class='btn btn-success' type='submit'>اضافه</button></a>
<hr>
    <div class="form-group">
      
        <label for="position">البيانات</label>
        <select name="position" class="form-control" id="position">
            <option value="all">الكل</option>
            <?php
            // استعلام SQL لاسترداد البيانات من جدول الفئات
            $sql = "SELECT position_id, position_name FROM position";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // حلق عبر كل الصفوف وأنشئ خيارات القائمة المنسدلة
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['position_id'] . '">' . $row['position_name'] . '</option>';
                }
            } else {
                echo '<option value="">لا توجد بيانات متاحة</option>';
            }
            ?>
        </select>
    </div>

    <div id="table-container">
        <!-- هنا سيتم عرض الجدول -->
    </div>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var positionSelect = document.getElementById("position");

        positionSelect.addEventListener("change", function() {
            var selectedValue = this.value;

            // إذا تم اختيار القيمة "all"، قم بإرسال استعلام AJAX لاسترجاع جميع البيانات
            var url = "ajax.php";
            var data = "selectedValue=" + encodeURIComponent(selectedValue);

            // استخدم AJAX لإرسال الاستعلام إلى الخادم
            var xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // عند استلام البيانات بنجاح، قم بتحديث الجدول
                    document.getElementById("table-container").innerHTML = xhr.responseText;
                }
            };
            xhr.send(data);
        });
    });
    </script>
</div>


            </div>
        </div>







    </div>
</div>
</div>


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
                                <label for="Ecode" class="form-label">رمز المقرر</label>
                                <input type="text" class="form-control" id="Ecode" name="Ecode" value="" readonly/>
                            </div>
                            <div class="mb-3 center">
                                <label for="Hour" class="form-label">عدد الساعات</label>
                                <input type="number" class="form-control" min="1" numaxlength="1" id="Hour" name="Hour" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Esubject" class="form-label">اسم المقرر</label>
                                <input type="text" class="form-control" id="Esubject" name="Esubject" value="" readonly/>
                            </div>
                        </div>
                    </div>
                    <br /> <br />
                    <button class="btn btn-primary" id="Ebtn">حفظ التغييرات</button>
                    <button type="button" class="btn btn-secondary" id="closeModalBtn" onclick="closeModal()">إلغاء</button>
<script>
function closeModal() {
    $("#myModal").modal("hide");
    location.reload(); // إعادة تحميل الصفحة بشكل اجباري
}
</script>
                </div>
            </div>
        </div>
    </div>
</div>
















<script>
   document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("sbtn").addEventListener("click", function() {
         var programName = document.getElementById("programName").value;
         var programID = document.getElementById("programID").value;
         var subjectName = document.getElementById("subjectName").value;
         var subjectCode = document.getElementById("subjectCode").value;
         var numberHour = document.getElementById("NumberHour").value;
            if (programName === '' || programID === '' || subjectName === '' || subjectCode === '' || numberHour === '') {
                alert("يرجى ملء جميع الحقول");
            } else {
                var programID = $('#programName').val();
                var subjectName = $('#subjectName').val();
                var subjectCode = $('#subjectCode').val();
                var numberHour = $('#NumberHour').val();
                 $.ajax({
                        url: 'insert_subject.php',
                        type: 'POST',
                        data: {
                            programID: programID,
                            subjectName: subjectName,
                            subjectCode: subjectCode,
                            numberHour: numberHour
                        },
                        success: function(response) {
                            console.log(response);
                            $('#insertModal').modal('hide');
                            $('#OKModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
            }
        });
    });
$('#NumberHour').on('input', function() {
         var enteredValue = parseFloat($(this).val());
        if (enteredValue > 9) {
            alert("القيمة المدخلة يجب ألا تتجاوز " + 9);
            $(this).val(0);
            }
});
$(document).ready(function(){
    var originalHour;
    $('body').on('click', '.btn-warning', function(){
        var row = $(this).closest('tr');
        var Scode = row.find('td:eq(0)').text();
        var Sname = row.find('td:eq(1)').text();
        var Hour = row.find('td:eq(2)').text();
        originalHour = Hour;
        $('#Ecode').val(Scode); 
        $('#Esubject').val(Sname);
        $('#Hour').val(Hour);
        $('#Hour').attr('max', 9);
        $('#editModal').modal('show');
        $('#Hour').on('input', function() {
            var enteredValue = parseFloat($(this).val());
            if (enteredValue > 9) {
                alert("القيمة المدخلة يجب ألا تتجاوز " + 9);
                $(this).val(originalHour);
            }
        });
    });
});
$(document).on('click', '#Ebtn', function(){
    var subjectName = $('#Esubject').val();
    var Hour = $('#Hour').val();
    $.ajax({
        url: 'update_subject.php',
        type: 'POST',
        data: {
            subjectName: subjectName,
            Hour: Hour
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
$(document).ready(function(){
    $('body').on('click', '.DeleteBtn', function(){
        var row = $(this).closest('tr');
        var Sname = row.find('td:eq(1)').text();
        var Hour = row.find('td:eq(2)').text();
        var code = row.find('td:eq(0)').text();
        $('#Dsubject').val(Sname);
        $('#Dhour').val(Hour);
        $('#code').val(code);
        $('#WarningModal').modal('show');
    });
});
$(document).on('click', '#Dbtn', function(){
    var subjectName = $('#Dsubject').val();
    var Hour = $('#Dhour').val();
    var code = $('#code').val();
    $.ajax({
        url: 'delete_subject.php',
        type: 'POST',
        data: {
            subjectName: subjectName,
            Hour: Hour,
            code: code
        },
        success: function(response) {
            console.log(response);
            $('#WarningModal').modal('hide');
            $('#OKModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
$(document).on('click', '#OK', function(){
    $('#OKModal').modal('hide');
    location.reload();
});
$(document).ready(function(){
    $('body').on('click', '.close-left', function(){
        $('#editModal').modal('hide');
        $('#WarningModal').modal('hide');
    });
});

</script>


        
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