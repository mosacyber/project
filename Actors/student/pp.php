
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?><?php





/*
// استعلام SQL لاسترداد بيانات المواد للفصل الدراسي الحالي
$sql_subjects = "SELECT c.subject_code, s.subject_name, s.credit_hours, ar.grade
                 FROM current_semester c
                 INNER JOIN subjects s ON c.subject_code = s.subject_code
                 LEFT JOIN academic_record ar ON c.student_id = ar.student_id AND c.subject_code = ar.subject_code
                 WHERE c.student_id = 431002997 AND c.Semester_Number = 451
                 ORDER BY c.Semester_Number DESC";

$result_subjects = $conn->query($sql_subjects);

if ($result_subjects->num_rows > 0) {
    // بدء جدول HTML
    echo "<table>
            <tr>
                <th>بيانات المواد</th>
            </tr>";

    // عرض بيانات المقرر في الجدول
    while ($row_subject = $result_subjects->fetch_assoc()) {
        // دمج جميع الأعمدة في سطر واحد
        $rowData = implode(', ', $row_subject);

        // عرض البيانات في صف جدول HTML
        echo "<tr>
                <td>" . $rowData . "</td>
              </tr>";
    }

    // إغلاق جدول HTML
    echo "</table>";
} else {
    echo "لا توجد بيانات متوفرة";
}

*/




// تعيين ترميز الاتصال بقاعدة البيانات إلى UTF-8
$conn->set_charset("utf8");

$sql = "SELECT DISTINCT subjects.subject_name, coursework_type.coursework_type_name, coursework.coursework_grade, grades.coursework_mark
FROM grades
INNER JOIN coursework ON grades.coursework_id = coursework.coursework_id
INNER JOIN subjects ON coursework.subject_code = subjects.subject_code
INNER JOIN coursework_type ON coursework.coursework_type_id = coursework_type.coursework_type_id
WHERE grades.student_id =  421002998";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // مصفوفة لتخزين البيانات المرتبة
    $data = array();

    // استرجاع وتنظيم البيانات
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // طباعة البيانات بتنسيق JSON
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo "لا توجد بيانات";
}










echo "<br><br><br>";

// تعيين ترميز الاتصال بقاعدة البيانات إلى UTF-8
$conn->set_charset("utf8");

$sql2 = "SELECT ar.subject_code, s.subject_name, s.credit_hours, IFNULL(ar.grade, 'غير متوفرة') AS grade
FROM academic_record ar
INNER JOIN subjects s ON ar.subject_code = s.subject_code
LEFT JOIN current_semester c ON c.student_id = ar.student_id AND ar.subject_code = c.subject_code AND ar.Semster_Number = c.Semester_Number
WHERE ar.student_id = 431002997 AND ar.Semster_Number = 441
ORDER BY ar.Semster_Number DESC";




$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // مصفوفة لتخزين البيانات المرتبة
    $data2 = array();

    // استرجاع وتنظيم البيانات
    while ($row2 = $result2->fetch_assoc()) {
        $data2[] = $row2;
    }

    // طباعة البيانات بتنسيق JSON
    echo json_encode($data2, JSON_UNESCAPED_UNICODE);
} else {
    echo "لا توجد بيانات";
}










echo "<br><br><br>";

?>








<?php
// تعيين ترميز الاتصال بقاعدة البيانات إلى UTF-8
$conn->set_charset("utf8");

// الاستعلام لاسترداد جميع أرقام المقررات من 'current_semester'
$sql = "SELECT DISTINCT subject_code, student_id, Semester_Number FROM current_semester";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // مصفوفة لتخزين البيانات
    $data = array();

    // استرجاع وتنظيم أرقام المقررات
    while ($row = $result->fetch_assoc()) {
        $subject_code = $row['subject_code'];
        $student_id = $row['student_id'];
        $Semster_Number = $row['Semester_Number'];

        // البحث عن المقرر في 'academic_record'
        $sql_record = "SELECT * FROM academic_record WHERE subject_code = '$subject_code' AND student_id = '$student_id' AND Semster_Number = '$Semster_Number'";
        $result_record = $conn->query($sql_record);

        if ($result_record->num_rows > 0) {
            // إذا وُجدت السجلات في 'academic_record'، يتم إضافتها إلى النتيجة
            while ($row_record = $result_record->fetch_assoc()) {
                $data[] = $row_record;
            }
        } else {
            // إذا لم يُعثر على السجلات، يتم إضافة المقرر مع نص "غير متوفر" بدلاً من الدرجة
            $data[] = array(
                'student_id' => $student_id,
                'subject_code' => $subject_code,
                'Semster_Number' => $Semster_Number,
                'grade' => 'غير متوفرة'
            );
        }
    }

    // طباعة البيانات بتنسيق JSON
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo "لا توجد بيانات";
}
?>

