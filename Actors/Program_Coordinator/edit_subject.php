<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث المقرر</title>
</head>
<body>
    <h1>تحديث المقرر</h1>
    <form action="" method="post">
        <label for="subject_code">رمز المقرر:</label>
        <input type="text" id="subject_code" name="subject_code" placeholder="رمز المقرر">
        <br>
        <label for="subject_name">اسم المقرر:</label>
        <input type="text" id="subject_name" name="subject_name" placeholder="اسم المقرر">
        <br>
        <label for="credit_hours">عدد الساعات:</label>
        <input type="text" id="credit_hours" name="credit_hours" placeholder="عدد الساعات">
        <br>
        <button type="submit">تحديث البيانات</button>
    </form>

    <?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
            include $path;
            break;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["subject_code"]) && !empty($_POST["subject_name"]) && !empty($_POST["credit_hours"])) {
            $subject_code = $_POST["subject_code"];
            $subject_name = $_POST["subject_name"];
            $credit_hours = $_POST["credit_hours"];
        } else {
            echo "الرجاء ملء جميع الحقول المطلوبة";
        }
    }
    ?>
</body>
</html>


  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl;">
                <h5 class="modal-title" id="editModalLabel">تعديل</h5>
                <button type="button" class="close-left btn btn-danger" onclick="closeModal();" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

<script>
function closeModal() {
    $("#myModal").modal("hide");
    location.reload(); 
}
</script>
            </div>
            <div class="modal-body">
                <div class="popup-form" id="popupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="studentName'" class="form-label">اسم الطالب</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" value="" readonly/>
                            </div>
                             <div class="mb-3">
                                <label for="studentid" class="form-label">رقم الطالب</label>
                                <input type="text" class="form-control" id="studentid" name="studentid" value="" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="Esubject" class="form-label">المقرر</label>
                                <input type="text" class="form-control" id="Esubject" name="Esubject" value="" readonly/>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Eactivity" class="form-label">اسم النشاط</label>
                            <input type="text" class="form-control" id="Eactivity" name="Eactivity" value="" readonly/>
                            <input type="hidden" class="form-control" id="courseworkid" name="courseworkid" value="" readonly/>
                        </div>

                            <div class="mb-3">
                                <label for="Ework" class="form-label">درجة الطالب</label>
                                <input type="number" class="form-control" id="Ework" name="Ework" value="" max=""/>
                            </div>
                        </div>
                    </div>
                    <br /> <br />
                    <button class="btn btn-primary" id="Ebtn">حفظ التغييرات</button>
                    <button type="button" class="btn btn-secondary" id="closeModalBtn" onclick="closeModal()">إلغاء</button>
<script>
function closeModal() {
    $("#myModal").modal("hide");
    location.reload();
}
</script>
                </div>
            </div>
        </div>
    </div>
</div>


$(document).on('click', '#Ebtn', function(){
    var studentid = $('#studentid').val();
    var studentName = $('#studentName').val();
    var subjectCode = $('#Esubject').val();
    var activityName = $('#Eactivity').val();
    var studentGrade = $('#Ework').val();
    var courseworkid = $('#courseworkid').val();
    $.ajax({
        url: 'update_data.php',
        type: 'POST',
        data: {
            studentid: studentid,
            studentName: studentName,
            subjectCode: subjectCode,
            activityName: activityName,
            studentGrade: studentGrade,
            courseworkid: courseworkid
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
