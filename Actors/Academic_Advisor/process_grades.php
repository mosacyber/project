<?php
$conn = @mysqli_connect("localhost", "root", "", "university_info")
    or die(mysqli_connect_error());
session_start();
if (isset($_POST['subjectCode'])) {
    $subjectCode = $_POST['subjectCode'];
    $subjectName = $_POST['subjectName'];
    $sql1 = "SELECT coursework_id
            FROM coursework
            WHERE subject_code = '$subjectCode'";

    $result1 = $conn->query($sql1);

    // Check if there are results
    if ($result1->num_rows > 0) {
        $coursework_ids = array();
        while ($row1 = $result1->fetch_assoc()) {
            $coursework_ids[] = $row1['coursework_id'];
        }

        $sql2 = "SELECT ct.coursework_type_name, cw.coursework_grade 
                         FROM coursework cw
                         JOIN coursework_type ct ON cw.coursework_type_ID = ct.coursework_type_id
                         WHERE cw.coursework_id IN (" . implode(",", $coursework_ids) . ")
                         AND cw.subject_code = '$subjectCode'";

        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            $columns_data = array();
            while ($row2 = $result2->fetch_assoc()) {
                $columns_data[$row2['coursework_type_name']] = $row2['coursework_grade'];
            }

            echo "<div class='card-body'>
                <div id='subject-heading' style='text-align: center; margin-bottom: 20px; font-size: 24px;'>" . $subjectName . "</div>
                <button class='btn btn-success mb-3' id='add-data-btn' data-toggle='modal' data-target='#insertModal' >
                <i class='bi bi-plus-circle'>اضافة علامات الطلاب</i> 
            </button>
                <div class='table-responsive'>
                    <table class='table'>
                      <thead>
                        <tr>
                          <th scope='col'>الرقم الجامعي</th>
                          <th scope='col'>اسم الطالب</th>";
            foreach ($columns_data as $column_name => $grade) {
                echo "<th scope='col'>$column_name / $grade</th>";
                $sum_deg = array_sum($columns_data);
            }
            echo "<th scope='col'>المجموع / $sum_deg</th>
                    <th scope='col'>ادارة الدرجات</th>
                    </tr>
                  </thead>
                  <tbody>";

        } else {
            echo "0 results";
        }

        $sql_students_grades = "SELECT 
            cs.student_id, 
            CONCAT(ac.First_Name, ' ', ac.Last_Name) AS student_name, ";
        foreach ($coursework_ids as $coursework_id) {
            $sql_students_grades .= "MAX(CASE WHEN coursework.coursework_id = $coursework_id THEN grades.coursework_Mark ELSE 0 END) AS \"$coursework_id\", ";
        }
        $sql_students_grades .= "cs.Semester_Number
            FROM current_semester cs
            JOIN grades ON cs.student_id = grades.student_ID
            JOIN coursework ON grades.coursework_id = coursework.coursework_id
            JOIN accounts ac ON cs.student_id = ac.Account_ID
            WHERE cs.subject_code = '$subjectCode' 
            AND cs.Faculty_member_ID = {$_SESSION['Account_ID']} 
            AND cs.Semester_Number =(select max(Semester_Number) from current_semester where Faculty_member_ID = {$_SESSION['Account_ID']})
            GROUP BY cs.student_id, ac.First_Name, ac.Last_Name";
        $result_students_grades = $conn->query($sql_students_grades);
        $st_sum_marks = 0;
        $st_sum_marks = 0;

        if ($result_students_grades->num_rows > 0) {
            while ($row_students_grades = $result_students_grades->fetch_assoc()) {
                $student_total_marks = 0;
                echo "<tr>";
                echo "<td>" . $row_students_grades['student_id'] . "</td>";
                echo "<td>" . $row_students_grades['student_name'] . "</td>";
                foreach ($coursework_ids as $coursework_id) {
                    $coursework_mark = $row_students_grades[$coursework_id];
                    echo "<td>" . $coursework_mark . "</td>";
                    $student_total_marks += $coursework_mark;
                }
                echo "<td>" . $student_total_marks . "</td>";
                echo "<td>
            <button class='btn btn-warning' data-toggle='modal' data-target='#editModal'>تعديل</button>
            <button class='btn btn-danger'>حذف</button></td>";
                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tr><td colspan='3'>لا يوجد درجات تم رصدها سابقًا.</td></tr>";
        }

        echo "</table></div><button id='close-table-btn' class='btn btn-danger'>إغلاق الجدول</button></div>";
    } else {
        echo "<p>لا يوجد أنواع عمل دراسي مسجلة لهذا الموضوع.</p>";
    }
} else {
    echo "<p>لم يتم تقديم معرف الموضوع.</p>";
}
?>
<style>
    #close-table-btn {
        display: block;
        margin: auto;
        margin-top: 20px;
        width: fit-content;
        font-size: 1.2rem;
        position: relative;
        left: 6%;
        transform: translateX(-50%);
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