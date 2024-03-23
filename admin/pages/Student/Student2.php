<!DOCTYPE html>
<html lang="ar">

<head> 

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include  '../../../assets/css/all/css.php' ?>

  <title>لوحة التحكم</title>

  <style>


.form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-outline-success {
  color: #fff;
  background-color: #198754;
  border-color: #198754;
}

.btn-outline-success:hover {
  color: #fff;
  background-color: #177a4a;
  border-color: #177a4a;
}

.btn-outline-secondary {
  color: #495057;
  background-color: #fff;
  border-color: #ced4da;
}

.btn-outline-secondary:hover {
  color: #495057;
  background-color: #e6e6e6;
  border-color: #ced4da;
}




















  body {
  direction: rtl;
  font-family: 'Arial', sans-serif;
}

.sidebar {
  position: fixed;
  top: 56px; /* ارتفاع الناف بار العلوي */
  right: 0;
  bottom: 0;
  width: 250px;
  padding-top: 15px;
  background-color: #343a40; /* لون الخلفية */
  transition: width 0.3s; /* تأثير التحول */
}

.sidebar.collapse {
  width: 56px; /* العرض عند الطي */
}

.sidebar .nav-link {
  color: #fff; /* لون النص */
}

/* استبدال هامش المحتوى بعد الناف بار الجانبي */
.content {
  padding: 20px;
}

/* تعديل هامش المحتوى عند إظهار وإخفاء الناف بار الجانبي */
@media (min-width: 992px) {
  .content {
    margin-right: 250px;
  }
}
@media (max-width: 992px) {
  .content {
    margin-right: 0;
  }
}









   .navbar-toggler {
      order: 1;
    }

    .navbar-brand {
      order: 2;
    }

    .sidebar {
      position: fixed;
      top: 56px;
      right: 0;
      bottom: 0;
      width: 250px;
      height: 100%;
      padding-top: 15px;
      background-color: #343a40;
      transition: width 0.5s ease-in-out, right 0.5s ease-in-out; /* تحديد تأثير التحول */
      overflow-x: hidden;
    }

    .sidebar.collapse {
      width: 56px;
      right: -250px;
    }

    .sidebar.collapse.show {
      right: 0;
    }

    .content {
      margin-right: 250px;
      padding: 20px;
      padding-top: 96px; /* ارتفاع الناف بار العلوي */
      transition: margin-right 0.5s ease-in-out; /* تحديد تأثير التحول */
    }

    /* تعديل موقع المحتوى عند الانكماش */
    @media (max-width: 992px) {
      .content {
        margin-right: 0;
      }
    }






 
    .rrrt {
    position: fixed;
    bottom: 0;
    padding-bottom: 21px;
}



    #sidebarCollapse > hr {
    margin: 1rem 0;
    color: #fff;
    border: 0;
    border-top: var(--bs-border-width) solid;
    opacity: .25;
}

























  </style>
</head>

<body>
  
<?php include '../../../navbar/admin/navbar.php'; ?>





  <!-- المحتوى الرئيسي -->
  <div class="content" >
    <div class=" container-fluid" >
   
<div class="pagetitle">
  <h1>لوحه الطلاب المتعثرين</h1>
 
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row " >

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

           

         
            <div class="card-body">
              <h5 class="card-title"> </h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6> عدد الطلاب  المتعثرين<span> | </span> 34688</h6>

                </div>
              </div>
            </div>
          

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
       
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          

        </div><!-- End Customers Card -->
        </div>
      </div>
    </div>
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          
        
        <div class="card">

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>



     



        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          


       
        <div class="card">

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>

          
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          




    



        <div class="card">

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>








        </div><!-- End Customers Card -->
               








    


        <!-- Recent Sales -->
        <div class="col-12">
          <div  class="card recent-sales overflow-auto">



            <div class="card-body " >

              <!-- Table with stripped rows -->
              <?php include '../../../db/data.php'; ?>
              <!-- End Table with stripped rows -->

            </div>

          </div>
        </div><!-- End Recent Sales -->


















    </div><!-- End Right side columns -->

  </div>
</section>

    </div>
  </div>
<script>
// تحديد الناف بار الجانبي والمحتوى
const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('.content');

// السماح بفتح وإغلاق الناف بار الجانبي عبر الناف العلوي
document.querySelector('.navbar-toggler').addEventListener('click', function() {
  sidebar.classList.toggle('collapse');
  if (sidebar.classList.contains('collapse')) {
    // إذا تمت إخفاء الناف بار الجانبي، زيادة هامش المحتوى
    content.style.marginRight = '0';
  } else {
    // إذا تمت إظهاره، تقليل هامش المحتوى
    content.style.marginRight = sidebar.offsetWidth + 'px';
  }
});

// ضبط هامش المحتوى عند التحميل الأولي
if (sidebar.classList.contains('collapse')) {
  content.style.marginRight = '0';
} else {
  content.style.marginRight = sidebar.offsetWidth + 'px';
}

// ضبط هامش المحتوى عند تغيير حجم الناف بار الجانبي
window.addEventListener('resize', function() {
  if (!sidebar.classList.contains('collapse')) {
    content.style.marginRight = sidebar.offsetWidth + 'px';
  }
});
</script>

  <!-- تضمين Bootstrap السكريبت -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
   <!-- Vendor JS Files -->
   <script src="../../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
</body>

</html>
