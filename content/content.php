    
    
    
<!--********************************/
/*********************************/
/*  الطلاب */
/*********************************/
/*********************************/
-->
    
<?php 
  if(isset($_SESSION['role']) && $_SESSION['role'] == '1') {

?>
    
    
    
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php

$sql4 = "SELECT * FROM students WHERE student_id = '{$_SESSION['Account_ID']}'";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();

    $sql5 = "SELECT * FROM programs WHERE Program_ID = {$row4['Program_ID']}";
    $result5 = $conn->query($sql5);

    $firstDigit = substr($row4['Program_ID'], 0, 1);

    $startPosition = 1; 
    $middleDigits = substr($row4['Program_ID'], $startPosition, 2);
    

    $endDigits = substr($row4['Program_ID'], -2);
    



    $sql6 = "SELECT * FROM colleges WHERE College_ID = $firstDigit";
    $result6 = $conn->query($sql6);
    if ($result6->num_rows > 0) {
        $row6 = $result6->fetch_assoc();


        $College_Name= $row6['College_Name'];
        

    }

    $sql7 = "SELECT * FROM departments WHERE Department_ID = '{$firstDigit}{$middleDigits}'";
    $result7 = $conn->query($sql7);
    if ($result7->num_rows > 0) {
        $row7 = $result7->fetch_assoc();


        $Department_Name= $row7['Department_Name'];
        

    }



    if ($result5->num_rows > 0) {
        $row5 = $result5->fetch_assoc();
    } else {
        
        echo "
        <div class='alert alert-danger'>
            <p>تنبيه: لا يوجد بيانات برنامج</p>
        </div>";
        
        $row5 = array('Program_Name' => 'برنامج غير معروف'); 
    }

    if (isset($_SESSION['role'])) {
        
        switch ($_SESSION['role']) {
            case '1':
                $Specialization = "";
                $Degree = "طالب";
                $Major = $row5['Program_Name'];
                break;
            default:
                
                break;
        }
    }
} else {
    
    echo "
    <div class='alert alert-danger'>
        <p>تنبيه: لا يوجد بيانات طالب</p>
    </div>";
    
    $row4 = array();
    $row5 = array('Program_Name' => 'برنامج غير معروف');
    $Specialization = "تخصص غير معروف";
    $Degree = "درجة غير معروفة";
    $Major = "تخصص غير معروف";
}

                ?>            



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Name'] ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الرقم الجامعي</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['Account_ID'] ?></div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">التخصص</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Major ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الدرجه العلميه</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Degree ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">القسم</div>
                    <div class="col-lg-9 col-md-8"><?php echo $Department_Name ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">الكليه</div>
                    <div class="col-lg-9 col-md-8"><?php echo $College_Name ?></div>
                  </div>



          </div>
        </div>


          </div>
       

        </div>
        

        <?php }?>

<!--********************************/
/*********************************/
/*  الطلاب */
/*********************************/
/*********************************/
-->





    
<!--********************************/
/*********************************/
/* */
/*********************************/
/*********************************/
-->

<?php 
  if(isset($_SESSION['role']) && $_SESSION['role'] == '6' || isset($_SESSION['role']) && $_SESSION['role'] == '4' || isset($_SESSION['role']) && $_SESSION['role'] == '2' || isset($_SESSION['role']) && $_SESSION['role'] == '7') {
?>


        
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php
if (isset($_SESSION['role'])) {

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
            break;
        default:
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

        <?php }?>

<!--********************************/
/*********************************/
/* */
/*********************************/
/*********************************/
-->







    
<!--********************************/
/*********************************/
/*   */
/*********************************/
/*********************************/
-->
    
<?php 
  if(isset($_SESSION['role']) && $_SESSION['role'] == '5' ||isset($_SESSION['role']) && $_SESSION['role'] == '3') {

?>


 
 <div class="col-xxl-12 col-md-12">
          <div class="card info-card revenue-card">

      
        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <?php
if (isset($_SESSION['role'])) {

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
        case '5':
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
            
            break;
        default:
            
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

<?php }?>

<!--********************************/
/*********************************/
/* */
/*********************************/
/*********************************/
-->






























