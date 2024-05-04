<?php
    $navbar_path = "db/db.php";
    for ($i = 0; $i < 9; $i++) {
        $path = str_repeat("../", $i) . $navbar_path;
        if (file_exists($path)) {
          include $path;
            break;
        }
    }
session_start();
if (isset($_POST['subjectCode'])) {
    $subjectCode = $_POST['subjectCode'];
    $subjectName = $_POST['subjectName'];

    $sql1 = "SELECT coursework_id
            FROM coursework
            WHERE subject_code = '$subjectCode'";

    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $coursework_ids = array();

        while ($row1 = $result1->fetch_assoc()) {
            $coursework_ids[] = $row1['coursework_id'];
        }

        echo "<div id='subject-heading' style='text-align: center; margin-bottom: 20px; font-size: 24px;'>" . $subjectName . "</div>";


        $sql_students_grades = "SELECT 
            cs.student_id, 
            CONCAT(ac.First_Name, ' ', ac.Last_Name) AS student_name,
            cs.Semester_Number
            FROM current_semester cs
            JOIN accounts ac ON cs.student_id = ac.Account_ID
            WHERE cs.subject_code = '$subjectCode' 
            AND cs.Faculty_member_ID = {$_SESSION['Account_ID']} 
            AND cs.Semester_Number = 452
            GROUP BY cs.student_id, ac.First_Name, ac.Last_Name";
        $result_students_grades = $conn->query($sql_students_grades);
        $stmt = $conn->prepare($sql_students_grades);
        $stmt->execute();
        $result5 = $stmt->get_result();
        $student = $result5->fetch_all(MYSQLI_ASSOC);
        if ($result_students_grades->num_rows > 0) {
            echo "<div class='card-body'>";
            echo " <button class='btn btn-success mb-3' id='add-data-btn' data-toggle='modal' data-target='#insertModal' >
          <i class='bi bi-plus-circle'>اضافة علامات الطلاب</i> 
          </button>";
            while ($row_students_grades = $result_students_grades->fetch_assoc()) {

                echo "<div class='table-responsive'>";
                echo "<table class='table'>";

                echo "<thead>
                <tr>
                <th style='text-align: center;' id='hi'>" . $row_students_grades['student_name'] . " / " . $row_students_grades['student_id'] . "</th>
                </tr>
                        <tr>
                        <th scope='col' style='display: none;'> name </th>
                        <th scope='col' style='display: none;'> name </th>
                        <th scope='col' style='display: none;'> name </th>
                            <th scope='col'>اسم النشاط</th>
                            <th scope='col'>درجة الطالب</th>
                            <th scope='col'>تعديل</th>
                            <th scope='col'>حذف</th>
                        </tr>
                    </thead>
                    <tbody>";

                foreach ($coursework_ids as $coursework_id) {
                    $sql_coursework_data = "SELECT 
                        ct.coursework_type_name,
                        cw.coursework_grade, 
                        cw.coursework_id
                        FROM coursework cw
                        JOIN coursework_type ct ON cw.coursework_type_ID = ct.coursework_type_id
                        WHERE cw.coursework_id = $coursework_id
                        AND cw.subject_code = '$subjectCode'";
                    $sql_coursework_type = "SELECT 
                                                ct.coursework_type_name,
                                                cw.coursework_id,cw.coursework_grade
                                                FROM coursework cw
                                                JOIN coursework_type ct ON cw.coursework_type_ID = ct.coursework_type_id
                                                WHERE cw.subject_code ='$subjectCode'";
                    $result_coursework_data = $conn->query($sql_coursework_data);
                    $stmt = $conn->prepare($sql_coursework_type);
                    $stmt->execute();
                    $result_type = $stmt->get_result();
                    $type = $result_type->fetch_all(MYSQLI_ASSOC);
                    if ($result_coursework_data->num_rows > 0) {
                        $row_coursework_data = $result_coursework_data->fetch_assoc();
                        echo "<tr>";
                        echo "<td style='display: none'>" . $row_students_grades['student_id'] . "</td>";
                        echo "<td style='display: none'>" . $row_students_grades['student_name'] . "</td>";
                        echo "<td style='display: none'>" . $subjectCode . "</td>";
                        echo "<td>" . $row_coursework_data['coursework_type_name'] . "</td>";
                        $sql_student_grade = "SELECT coursework_Mark , coursework_id
                                                FROM grades
                                                WHERE student_ID = '" . $row_students_grades['student_id'] . "'
                                                AND coursework_id = $coursework_id AND subject_Code = '$subjectCode'";
                        $result_student_grade = $conn->query($sql_student_grade);
                        if ($result_student_grade->num_rows > 0) {
                            $row_student_grade = $result_student_grade->fetch_assoc();
                            echo "<td>" . $row_student_grade['coursework_Mark'] . "</td>";
                            echo "<td style='display: none;'>" . $row_coursework_data['coursework_grade'] . "</td>";
                            echo "<td style='display: none;'>" . $row_student_grade['coursework_id'] . "</td>";
                        } else {
                            echo "<td>لم يتم رصد درجات هذا النشاط للطالب</td>";
                        }

                        echo "<td><a class='btn btn-warning' data-toggle='modal' data-target='#editModal'>تعديل</a></td>";
                        echo "<td><button class='btn btn-danger Deletegrade' data-toggle='modal' data-target='#WarningModal'>حذف</button></td>";
                        echo "</tr>";
                    }
                }

                $total = 0;
                foreach ($coursework_ids as $coursework_id) {
                    $sql_student_grade = "SELECT coursework_Mark
                                            FROM grades
                                            WHERE student_ID = '" . $row_students_grades['student_id'] . "'
                                            AND coursework_id = $coursework_id AND subject_Code = '$subjectCode'";
                    $result_student_grade = $conn->query($sql_student_grade);
                    if ($result_student_grade->num_rows > 0) {
                        $row_student_grade = $result_student_grade->fetch_assoc();
                        $total += $row_student_grade['coursework_Mark'];
                    }
                }
                $progress_color = "";
                if ($total > 90) {
                    $progress_color = "#6fe381";
                } elseif ($total >= 80 && $total <= 89) {
                    $progress_color = "#d3ef5e";
                } elseif ($total >= 70 && $total <= 79) {
                    $progress_color = "#fee43f";
                } elseif ($total >= 60 && $total <= 69) {
                    $progress_color = "#f19c26";
                } else {
                    $progress_color = "#ed4c36";
                }
                echo "<tr>";
                echo "<td colspan='1' space='col'>المجموع:</td>";
                echo "<td colspan='3'><div class='progress'>
                        <div class='progress-bar' role='progressbar' style='width: " . $total . "%; background-color: " . $progress_color . ";' aria-valuenow='" . $total . "'
                            aria-valuemin='0' aria-valuemax='100'>" . $total . "</div>
                        </div>
                    </td>";
                echo "</tr>";

                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            }
        } else {
            echo "<p>لا يوجد طلاب مسجلين في هذا المقرر.</p>";
        }
    } else {
        echo "<p>لا يوجد أنواع عمل دراسي مسجلة لهذا المقرر.</p>";
    }
} else {
    echo "<p>لم يتم تقديم معرف المقرر.</p>";
}
?>
<button id='close-table-btn' class='btn btn-danger'>إغلاق الجدول</button>
</div>
<style>
    #close-table-btn {

        display: block;
        margin: auto;
        margin-top: 20px;
        width: fit-content;
        font-size: 1.2rem;
        position: relative;
        /* إضافة */
        left: 6%;
        /* إضافة */
        transform: translateX(-50%);
        /* إضافة */
        padding: 10px 20px;
    }
</style>

<?php
echo "
  <script>
  document.getElementById('close-table-btn').addEventListener('click', function() {
      document.getElementById('grades-table').style.display = 'none';
  });
  </script>
  ";
?>
<!-- واحهة الاضافة -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl;">
                <h5 class="modal-title" id="insertModalLabel">إضافة درجات طالب</h5>
                <button type="button" class="close-left btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="popup-form" id="popupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Name" class="form-label">أسم الطالب</label><br>
                                <select class="form-select" id="Name" name="Student">
                                    <option value="">أختر طالب</option>
                                    <?php foreach ($student as $students): ?>
                                        <option value="<?php echo $students['student_id']; ?>">
                                            <?php echo $students['student_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" id="sid" name="sid">
                            </div>
                            <div class="input-group mt-3">
                                <span class="input-group-text">أسم المقرر</span>
                                <input type="text" class="form-control" name="subject" id="subject" readonly
                                    value="<?php echo $subjectCode ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="work" class="form-label">أسم النشاط</label><br>
                                <select class="form-select" id="work">
                                    <option value="">أختر نشاط</option>
                                    <?php foreach ($type as $types): ?>
                                        <option value="<?php echo $types['coursework_id']; ?>">
                                            <?php echo $types['coursework_type_name']; ?> <span
                                                id="gr"><?php echo $types['coursework_grade']; ?></span></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" id="num" name="num">
                            </div>
                            <div class="input-group mb-3" id="grade">
                                <span class="input-group-text">الدرجة</span>
                                <input type="number" class="form-control" id="gradeInput" min="0" name="gradeInput" value="">
                            </div>
                            <input type="hidden" class="form-control" id="grade_insert" name="grade_insert" value="">
                        </div>
                    </div>
                    <br /> <br />
                    <button class="btn btn-primary" id="sbtn">إضافة</button>
                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">إلغاء</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- واجهة التعديل -->
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
                                <label for="studentName'" class="form-label">اسم الطالب</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" value=""
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label for="studentid" class="form-label">رقم الطالب</label>
                                <input type="text" class="form-control" id="studentid" name="studentid" value=""
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label for="Esubject" class="form-label">المقرر</label>
                                <input type="text" class="form-control" id="Esubject" name="Esubject" value=""
                                    readonly />
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Eactivity" class="form-label">اسم النشاط</label>
                                <input type="text" class="form-control" id="Eactivity" name="Eactivity" value=""
                                    readonly />
                                <input type="hidden" class="form-control" id="courseworkid" name="courseworkid" value=""
                                    readonly />
                            </div>

                            <div class="mb-3">
                                <label for="Ework" class="form-label">درجة الطالب</label>
                                <input type="number" class="form-control" min="0" id="Ework" name="Ework" value="" max="" />
                                <input type="hidden" class="form-control" id="Full_grade" name="Full_grade" value=""
                                    max="" />
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
<!-- واجهة الحذف -->
<div class="modal fade" id="WarningModal" tabindex="-1" role="dialog" aria-labelledby="WarningModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl;">
                <h5 class="modal-title" id="WarningModalLabel">رسالة تنبيه</h5>
                <button type="button" class="close-left btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="popup-form" id="popupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <label for="eventName" class="form-label">النشاط : <input type="text" id="Dsubject"
                                        style="border: none;"></label>
                                <label for="eventName" class="form-label">الطالب : <input type="text" id="Dname"
                                        style="border: none;"></label>
                                <input type="text" id="numberID" style="border: none; display: none;">
                                <input type="text" id="courseID" style="border: none; display: none;">
                                <input type="text" id="Code" style="border: none; display: none;">
                                <input type="text" id="Sgrade" style="border: none; display: none;">
                                <label for="Message" class="form-label">هل ترغب في حذف درجة هذا النشاط ؟</label>
                            </div>
                            <br /> <br />
                            <div class="d-flex justify-content-start">
                                <button class="btn btn-danger" id="Dbtn">حذف</button>
                                <span style="color: white;">h</span>
                                <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- واجهة نجاح التنفيذ -->
<div class="modal fade" id="OKModal" tabindex="-1" role="dialog" aria-labelledby="OKModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl;">
                <h5 class="modal-title" id="WarningModalLabel">رسالة نجاح</h5>
                <button type="button" class="close-left btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="popup-form" id="popupForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class=" text-end">
                                <input type="text" id="Co" style="display: none;">
                                <label for="eventName" class="form-label">تمت العملية بنجاح</label>
                            </div>
                            <br /> <br />
                            <div class="d-flex justify-content-start">
                                <button class="btn btn-primary me" id="OK">موافق</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('work').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var grade = selectedOption.text;
        var coursework_id = selectedOption.value;
        $('#num').val(coursework_id);
        var gradeInput = document.getElementById('gradeInput');
        var len = grade.length - 2;
        var gr = grade.substr(len, 2);
        $('#grade_insert').val(gr);
        gradeInput.max = gr;
        $('#gradeInput').on('input', function () {
            var insert_grade = document.getElementById('grade_insert').value;
            var enteredValue = parseFloat($(this).val());
            if (enteredValue > insert_grade) {
                alert("القيمة المدخلة يجب ألا تتجاوز " + insert_grade);
                $(this).val(0);
            }
        });

    });
    document.getElementById('Name').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var name = selectedOption.value;
        $('#sid').val(name);
    });
    $(document).on('click', '#sbtn', function () {
        var sid = $('#sid').val();
        var subject = $('#subject').val();
        var num = $('#num').val();
        var gradeInput = $('#gradeInput').val();

        $.ajax({
            url: 'insert_grades.php',
            type: 'POST',
            data: {
                sid: sid,
                subject: subject,
                gradeInput: gradeInput,
                num: num
            },
            success: function (response) {
                console.log(response);
                $('#insertModal').modal('hide');
                $('#OKModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).ready(function () {
        var originalGrade;
        $('body').on('click', '.btn-warning', function () {
            var row = $(this).closest('tr');
            var studentid = row.find('td:eq(0)').text();
            var studentName = row.find('td:eq(1)').text();
            var subjectCode = row.find('td:eq(2)').text();
            var activityName = row.find('td:eq(3)').text();
            var studentGrade = row.find('td:eq(4)').text();
            var grade = row.find('td:eq(5)').text();
            var num = row.find('td:eq(6)');
            originalGrade = studentGrade;
            $('#studentid').val(studentid);
            $('#studentName').val(studentName);
            $('#Esubject').val(subjectCode);
            $('#Eactivity').val(activityName);
            $('#Ework').val(studentGrade);
            $('#courseworkid').val(num.text());
            $('#Full_grade').val(grade);
            $('#Ework').attr('max', grade);
            $('#editModal').modal('show');

            $('#Ework').on('input', function () {
                var Full_Grade = document.getElementById('Full_grade').value;
                var enteredValue = parseFloat($(this).val());
                if (enteredValue > Full_Grade) {
                    alert("القيمة المدخلة يجب ألا تتجاوز " + Full_Grade);
                    $(this).val(originalGrade);
                }
            });
        });
    });

    $(document).on('click', '#Ebtn', function () {
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
            success: function (response) {
                console.log(response);
                $('#editModal').modal('hide');
                $('#OKModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).ready(function () {
        $('body').on('click', '.Deletegrade', function () {
            var row = $(this).closest('tr');
            var row = $(this).closest('tr');
            var studentid = row.find('td:eq(0)').text();
            var studentName = row.find('td:eq(1)').text();
            var subjectCode = row.find('td:eq(2)').text();
            var activityName = row.find('td:eq(3)').text();
            var studentGrade = row.find('td:eq(4)').text();
            var grade = row.find('td:eq(5)').text();
            var num = row.find('td:eq(6)').text();
            $('#numberID').val(studentid);
            $('#Dname').val(studentName);
            $('#Dsubject').val(activityName);
            $('#Code').val(subjectCode);
            $('#courseID').val(num);
            $('#Sgrade').val(studentGrade);
            $('#WarningModal').modal('show');
        });
    });
    $(document).on('click', '#Dbtn', function () {
        var numberID = $('#numberID').val();
        var Code = $('#Code').val();
        var courseID = $('#courseID').val();
        var Sgrade = $('#Sgrade').val();

        $.ajax({
            url: 'Delete_grade.php',
            type: 'POST',
            data: {
                numberID: numberID,
                Code: Code,
                courseID: courseID,
                Sgrade: Sgrade
            },
            success: function (response) {
                var subjectCode = response.split('|')[1];
                $('#Co').val(subjectCode);
                console.log(response);
                $('#WarningModal').modal('hide');
                $('#OKModal').modal('show');

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('click', '#OK', function () {
        $('#OKModal').modal('hide');
        location.reload();
        var Code = $('#Co').val();
        console.log(Code);
        // document.getElementById(Co).style.display = 'block';
    });

</script>


<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>