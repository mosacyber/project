
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="ar">

<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
</style>
</head>
    <?php
    // إذا كان المستخدم طالب، يمكن عرض الروابط
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'student'){
        // إذا كان المستخدم ليس أدمن، يمكن عرض الروابط
       //echo '<li><a class="dropdown-item" href="' . $config['app_url'] . 'Actors/student/student.php">حسابك</a></li>';
      echo '<ul>
  <li><a href="#news">المواد</a></li>
  <li><a href="#home">الدرجات</a></li>
  <li><a href="#news">الاداء الاكاديمي السابق</a></li>
  <li><a href="#contact">التواصل مع المرشد الاكاديمي</a></li>
  <li style="float:left"><a class="active" href="#about">حسابك</a></li>
</ul>';
    }
    // إذا كان المستخدم عميد الكلية، يمكن عرض الروابط
    else if (isset($_SESSION['role']) && $_SESSION['role'] == 'Dean_of_the_College') {
        // إذا كان المستخدم أدمن، يمكن عرض رابط "صفحة الأدمن"
        // echo '<li><a class="dropdown-item" href="' . $config['app_url'] . 'admin/dashboard/accounts.php">صفحة الأدمن</a></li>';
        echo '<ul>
        <li><a href="#news">الطلاب</a></li>
        <li><a href="#home">الدرجات</a></li>
        <li><a href="#news">ادخال الدرجات</a></li>
        <li><a href="#contact">التواصل مع الطلاب </a></li>
        <li style="float:left"><a class="active" href="#about">حسابك</a></li>
      </ul>';
    }
    // إذا كان المستخدم عضو هيئة تدريس، يمكن عرض الروابط
    else if (isset($_SESSION['role']) && $_SESSION['role'] == 'Faculty_Member') {
      echo '<ul>
      <li><a href="#news">الطلاب</a></li>
      <li><a href="#home">الدرجات</a></li>
      <li><a href="#news">ادخال الدرجات</a></li>
      <li><a href="#contact">التواصل مع الطلاب </a></li>
      <li style="float:left"><a class="active" href="#about">حسابك</a></li>
    </ul>';
  }
    // إذا كان المستخدم مرشد اكاديمي، يمكن عرض الروابط
  else if (isset($_SESSION['role']) && $_SESSION['role'] == 'Academic_Advisor') {
    echo '<ul>
    <li><a href="#news">الطلاب</a></li>
    <li><a href="#home">الدرجات</a></li>
    <li><a href="#news">ادخال الدرجات</a></li>
    <li><a href="#contact">التواصل مع الطلاب </a></li>
    <li style="float:left"><a class="active" href="#about">حسابك</a></li>
  </ul>';
}  
    // إذا كان المستخدم مدير الجامعة، يمكن عرض الروابط
else if (isset($_SESSION['role']) && $_SESSION['role'] == 'President_of_the_University') {
  echo '<ul>
  <li><a href="#news">الطلاب</a></li>
  <li><a href="#home">الدرجات</a></li>
  <li><a href="#news">ادخال الدرجات</a></li>
  <li><a href="#contact">التواصل مع الطلاب </a></li>
  <li style="float:left"><a class="active" href="#about">حسابك</a></li>
</ul>';
}  
    // إذا كان المستخدم منسق البرنامج، يمكن عرض الروابط
else if (isset($_SESSION['role']) && $_SESSION['role'] == 'Program_Coordinator') {
  echo '<ul>
  <li><a href="#news">الطلاب</a></li>
  <li><a href="#home">الدرجات</a></li>
  <li><a href="#news">ادخال الدرجات</a></li>
  <li><a href="#contact">التواصل مع الطلاب </a></li>
  <li style="float:left"><a class="active" href="#about">حسابك</a></li>
</ul>';
}  
  // إذا كان المستخدم وكيل الجامعة، يمكن عرض الروابط
  else if (isset($_SESSION['role']) && $_SESSION['role'] == 'Vice_President_for_Academic_Affairs') {
  echo '<ul>
  <li><a href="#news">الطلاب</a></li>
  <li><a href="#home">الدرجات</a></li>
  <li><a href="#news">ادخال الدرجات</a></li>
  <li><a href="#contact">التواصل مع الطلاب </a></li>
  <li style="float:left"><a class="active" href="#about">حسابك</a></li>
</ul>';
}  
  // إذا كان المستخدم الادمن. يمكن عرض الروابط
else if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
  echo '<ul>
  <li><a href="#news">الطلاب</a></li>
  <li><a href="#home">الدرجات</a></li>
  <li><a href="#news">ادخال الدرجات</a></li>
  <li><a href="#contact">التواصل مع الطلاب </a></li>
  <li style="float:left"><a class="active" href="#about">حسابك</a></li>
</ul>';
}
    ?>
