<?php include '../../db/db.php';  ?>
<!doctype html>
<html lang="ar" dir="rtl" >
  <head>
    <!-- مكتبه htmx -->
  <script src="https://unpkg.com/htmx.org@1.9.10" integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous"></script>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>قالب لوحة القيادة · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard-rtl/">

    

    <!-- Bootstrap core CSS -->
<link href="../../assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }#sidebarMenu > div > ul > li:nth-child(2) > a{
        background-color: #0d73f8;
        color: #fff;
        border: 2px solid;
        border-radius: 7px;
      }


      .ttr1{

        display: inline-block;
      }
      .ttrr{


      background-color: black;
    }
    .ttrr1{

border: 2px solid #343a40 ;
background-color: brown;
}.ttrr2{
  border: 2px solid #E5FF00 ;

background-color: forestgreen;
}.ttrr3{
  border: 2px solid #343a40 ;

height: 150px;
background-color: dimgray;
}

.ttrr4{
background-color: black;
}

.sidebar {
  width: 250px; /* يمكنك ضبط عرض الناف بار حسب الحاجة */
}

.main-content {
  flex: 1; /* يجعل المحتوى يمتلئ بالمساحة المتبقية */
}
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      right: 0;
      z-index: 100; /* ليكون فوق المحتوى */
      padding: 48px 0; /* تعديل البادينج بحسب التصميم */
      overflow-x: hidden; /* للتأكد من عدم ظهور شريط التمرير الأفقي */
      background-color: #f8f9fa; /* لون خلفية الناف بار */
      
    }   
    
    .sidebar2 {
      position: fixed;
      bottom: 0;
      right: 0;
      z-index: 100; /* ليكون فوق المحتوى */
      padding: 48px 0; /* تعديل البادينج بحسب التصميم */
      overflow-x: hidden; /* للتأكد من عدم ظهور شريط التمرير الأفقي */
      background-color: #f8f9fa; /* لون خلفية الناف بار */
      
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar li {
      margin-bottom: 8px; /* تعديل المسافات بين العناصر */
    }
    .sidebar li a {
      display: block;
      padding: 10px 16px;
      color: #343a40; /* لون النص */
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .sidebar li a:hover {
      background-color: #e9ecef; /* لون خلفية العنصر عند التحويل */
    }
    </style>


  </head>
  <body >
    


<div class="container-fluid" >
  <div class="row">


  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">لوحة القيادة</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">تسجيل الخروج</a>
    </div>
  </div>
</header>
    
  <?php include './Navbar.php'; ?>






<div class="container-fluid ttrr4 col-md-10 col-lg-10" style="position: fixed;  left:0;"> 

    <div class="container-fluid ttrr2 col-md-12 col-lg-12" >
      <br><br>
      <label>الوصف للصفحه</label>
      </div>

    <div class="container-fluid ttrr2 col-md-12 col-lg-12" >
    <label >
    التصفية
    </label> 
    </div>

    <div class="container-fluid ttrr2 col-md-8 col-lg-8" >
    <label >
    اختر نوع التصفية
    </label>
    </div>







<div class="container-fluid">
  <div class="row">


  <div dir="rtl" class="ttrr1 col-md-2 col-lg-2">
         
  
  </div>



  <div dir="rtl" class="ttrr2 col-md-8 col-lg-8" >
  <h6 dir="rtl" >الدفعة</h6>


                <div  dir="rtl" class="ttr1 col-md-8 col-lg-2">
                          
                          <label dir="ltr" for="xiaomi" >
                            <span class="text">41</span>
                            <input type="checkbox" name="" id="xiaomi">
                            <span class="bg"></span>
                          </label>
                
                </div>
                <div  dir="rtl" class="ttr1 col-md-8 col-lg-2">
                          
                          <label dir="ltr" for="xiaomi" >
                            <span class="text">42</span>
                            <input type="checkbox" name="" id="xiaomi">
                            <span class="bg"></span>
                          </label>
                
                </div>
                <div dir="rtl" class="ttr1 col-md-8 col-lg-2">
                          
                          <label dir="ltr" for="xiaomi" >
                            <span class="text">43</span>
                            <input type="checkbox" name="" id="xiaomi">
                            <span class="bg"></span>
                          </label>
                
                </div>
                <div  dir="rtl" class="ttr1 col-md-8 col-lg-2">
                          
                          <label dir="ltr" for="xiaomi" >
                            <span class="text">41</span>
                            <input type="checkbox" name="" id="xiaomi">
                            <span class="bg"></span>
                          </label>
                
                </div>
                <div  dir="rtl" class="ttr1 col-md-8 col-lg-2">
                          
                          <label dir="ltr" for="xiaomi" >
                            <span class="text">42</span>
                            <input type="checkbox" name="" id="xiaomi">
                            <span class="bg"></span>
                          </label>
                
                </div>

  </div>
  

      <div dir="rtl" class="ttrr1 col-md-2 col-lg-2 " align="center">



        <br>
                  <label for="xiaomi" >
                      <button type="button" class="btn btn-primary" > تطبيق </button>
                  </label>
        <br><br>
      </div>
  

  </div>  
</div>

        
       
         <div dir="rtl" class="ttrr1 col-md-11 col-lg-12">
         
  
       
    <main  class="col-md-12 ms-sm-auto col-lg-12 px-md-4 ttrr1" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
   
      <div  class="table-responsive">
         <!-- عرض جميع التصنيفات -->
         <div class="shipment-box-container">
                    <div class="container mt-5">



                              <div class="edit">
                              <div id="edit-result"></div>
                              </div>







                        <h2 class="text-center mb-4">جميع الحسابات</h2>
                        
                        <div>
                          

                        <?php
                                        include '../../db/dbms.php';

                                        try {
                                            $query = "SELECT * FROM accounts"; // استبدل your_table_name بالاسم الصحيح لجدولك

                                            $statement = $db->prepare($query);
                                            $statement->execute();

                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            $a=1;
                                            echo '<table class="table table-bordered" border="1" >
                                                    <thead>
                                                        <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">الاسم الاول</th>
                                                        <th scope="col">الاسم الاخير</th>
                                                        <th scope="col">الرقم الجامعي</th>
                                                        <th scope="col">الايميل</th>
                                                        <th scope="col">رقم الجوال</th>
                                                        <th scope="col">المنصب</th>
                                                        <th scope="col">تعديل</th>
                                                        <th scope="col">حذف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody hx-swap="beforeend" hx-target=".table tbody" hx-trigger="load" >
                                                    ';


                                                    foreach ($result as $row) {
                                                      echo '<tr>
            <td>' . $a++ . '</td>
            <td>' . $row['First_Name'] . '</td>
            <td>' . $row['Last_Name'] . '</td>
            <td>' . $row['Account_ID'] . '</td>
            <td>' . $row['Email'] . '</td>
            <td>' . $row['Mobile'] . '</td>
            <td>' . $row['Position'] . '</td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropLive2' . $row['Account_ID'] . '"> تعديل </button>

                </td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropLive' . $row['Account_ID'] . '"> حذف </button>

            </td>
        </tr>



        <!-- البداية -->
        <!-- شاشه منبثقه -->
        <div class="modal fade" id="staticBackdropLive' . $row['Account_ID'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel' . $row['Account_ID'] . '" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLiveLabel' . $row['Account_ID'] . '">حذف بيانات طالب</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span>هل انت متاكد من انك تريد حذف بيانات </span><span>'. $row['First_Name'] .' !</span>
                        <br>
                        <span>الرقم الجامعي : </span><span>' . $row['Account_ID'] . '</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button hx-trigger="click" hx-delete="./api.php?action=delete&Account_ID=' . $row['Account_ID'] . '" class="btn btn-primary">حذف</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- النهايه -->

        


  

                    <!-- البداية -->
                    <form action="" class="edit-categories-form" method="post">
                    <div class="modal fade" id="staticBackdropLive2' . $row['Account_ID'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel' . $row['Account_ID'] . '" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <span>هل انت متاكد من انك تريد حذف بيانات </span><span>'. $row['First_Name'] .' !</span>
                        <br>
                      
                        <input name="First_Name" id="number" type="text" class="form-control" placeholder="First_Name" value="' . $row['First_Name'] . '" />
                        <br>
                        <span></span>                  
                        <input name="Last_Name" id="number" type="text" class="form-control" placeholder="Last_Name" value="' . $row['Last_Name'] . '" />
                        <br>
                        <span></span>                  
                        <input name="Account_ID" id="number" type="text" class="form-control" placeholder="Account_ID" value="' . $row['Account_ID'] . '"Disabled input" "  />
                        <br>
                        <span></span>                  
                        <input name="Email" id="number" type="text" class="form-control" placeholder="Email" value="' . $row['Email'] . '" />
                        <br>
                        <span></span>                  
                        <input name="Position" id="number" type="text" class="form-control" placeholder="Position" value="' . $row['Position'] . '" />
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button  name="update" class="btn btn-primary">تعديل</button>
                    </div>
                </div>
              </div>
            </div>
            </form>
            <!-- النهايه -->
           
        ';
}

if (isset($_POST['update'])) {
  $Account_ID = $_POST['Account_ID'];
  $First_Name = $_POST['First_Name'];
  $Last_Name = $_POST['Last_Name'];
  $Email = $_POST['Email'];
  $Position = $_POST['Position'];
// استخدام الاتصال نفسه الذي تم استخدامه في PDO
$update_query = "UPDATE accounts SET Account_ID = '$Account_ID', First_Name = '$First_Name', Last_Name = '$Last_Name', Email = '$Email', Position = '$Position' WHERE Account_ID  = '$Account_ID'";
$update_result2 = $db->query($update_query);

if ($update_result2) {
    echo '      <div class="delivery-date-track">
    <p id="success-message" class="alert alert-success">تم تحديث البيانات بنجاح</p>
    </div>
    
    ';
    echo '<script>hideEditForm();</script>'; // إخفاء نموذج التعديل بعد نجاح التحديث

    // قم بتحريك header هنا
    
    // الكود الذي يقوم بالتحديث التلقائي للصفحة بعد إجراء التحديث
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { window.location.href = "accounts.php"; }, 1000);'; // بعد 1000 مللي ثانية (1 ثانية)
    echo '</script>';

    
} else {
    echo '<p class="date">حدث خطأ أثناء التحديث: ' . $db->errorInfo()[2] . '</p>';
}
}
           





                                            echo '</tbody></table>';
                                        } catch (PDOException $e) {
                                            echo "Failed to retrieve data: " . $e->getMessage();
                                        }
                                        ?>


                        
                        </div>
                        
                       

                    </div>
                </div>
            </div>
      </div>
    </main>

    </div>

  
       


    <div dir="rtl" class="ttrr2 col-md-12 col-lg-12">

<br><br><br><br>
</div>


    <div class="container-fluid ttrr3 col-md-12 col-lg-12" style="position: fixed; bottom: 0;">
      <label for="الرقم الجامعي">الحقوق في الاسفل</label>
    </div>



  </div>



  <div dir="rtl" class=" col-md-2 col-lg-2">
            

  
  </div>











</div>

</div>

    <script src="sidebars.js"></script>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

<?php
// التحديث إذا تم النقر على زر "تحديث"
if (isset($_POST['update'])) {
    $First_Name = $_POST['First_Name'];
    $update_query = "UPDATE accounts SET First_Name = '$First_Name' WHERE Account_ID  = '$Account_ID'";
    $update_result2 = mysqli_query($connection, $update_query);

    if ($update_result2) {
        echo '      <div class="delivery-date-track">
        <p id="success-message" class="date">تم تحديث البيانات بنجاح</p>
        </div>
        
        ';
        echo '<script>hideEditForm();</script>'; // إخفاء نموذج التعديل بعد نجاح التحديث

        // قم بتحريك header هنا
        
        // الكود الذي يقوم بالتحديث التلقائي للصفحة بعد إجراء التحديث
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { window.location.href = "accounts.php"; }, 1000);'; // بعد 1000 مللي ثانية (1 ثانية)
        echo '</script>';
    
        
    } else {
        echo '<p class="date">حدث خطأ أثناء التحديث: ' . mysqli_error($connection) . '</p>';
    }
}
?>
    








  <script>
    // Toggle
const button = document.querySelector("#kt_page_loading_basic");

// Handle toggle click event
button.addEventListener("click", function() {
    // Populate the page loading element dynamically.
    // Optionally you can skipt this part and place the HTML
    // code in the body element by refer to the above HTML code tab.
    const loadingEl = document.createElement("div");
    document.body.append(loadingEl);
    loadingEl.classList.add("page-loader");
    loadingEl.innerHTML = `
        <span class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </span>
    `;

    // Show page loading
    KTApp.showPageLoading();

    // Hide after 3 seconds
    setTimeout(function() {
        KTApp.hidePageLoading();
        loadingEl.remove();
    }, 3000);
});
  </script>

     
          
          
        
        
      
 







