<?php include '../../db/db.php';  ?>
<!doctype html>
<html lang="ar" dir="rtl">
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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../dashboard/dashboard.rtl.css" rel="stylesheet">
  </head>
  <body>
    
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

<div class="container-fluid">
  <div class="row">



    
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              لوحة القيادة
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              عرض البيانات
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              متابعة وانشاء التقارير
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              ادارة بيانات النظام
            </a>
          </li>
        </ul>

        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
   
      <div class="table-responsive">
         <!-- عرض جميع التصنيفات -->
         <div class="shipment-box-container">
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">جميع الحسابات</h2>
                        <table class="table table-bordered">
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
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM accounts";
                                $result = $connection->query($sql);

                                if (!$result) {
                                    echo "Error in query: " . $connection->error;
                                } else {
                                    $count = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $Account_ID  = $row['Account_ID'];
                                        $First_Name = $row['First_Name'];
                                        $Last_Name  = $row['Last_Name'];
                                        $Email  = $row['Email'];
                                        $Mobile  = $row['Mobile'];
                                        $Position  = $row['Position'];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $First_Name; ?></td>
                                            <td><?php echo $Last_Name; ?></td>
                                            <td><?php echo $Account_ID; ?></td>
                                            <td><?php echo $Email; ?></td>
                                            <td><?php echo $Mobile; ?></td>
                                            <td><?php echo $Position; ?></td>
                                            <td>
                                                <a href="Trademarks.php?edit=<?php echo $Account_ID ; ?>" class="btn btn-warning btn-sm">تعديل</a>
                                            </td>
                                            <td>
                                            <button class="btn btn-danger btn-sm" onclick='deleteUser("<?php echo $Account_ID ; ?>")'>حذف</button>
                                            </td>
                                        </tr>
                                <?php
                                        $count++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
    </main>
  </div>
</div>


    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
