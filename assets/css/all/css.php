


<?php



echo '
<!-- navbar -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
<link rel="stylesheet" href="style.css" />
<script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

<!-- فلتر السنه الطلاب -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2018/irs/ion.rangeSlider.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2018/irs/ion.rangeSlider.skin.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2018/irs/ion.rangeSlider.min.js"></script>

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- تضمين Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">


  ';








$currentPage = basename($_SERVER['PHP_SELF']);

// التحقق من كونها صفحة index
if ($currentPage === 'index.php') {
  echo '
  <!-- Template Main CSS File -->
  <link href="../assets/css/nav_css/style.css" rel="stylesheet">
  ';

}


$currentPage2 = $_SERVER['SCRIPT_FILENAME'];
if(strpos($currentPage2, '/Student/') !== false){
echo '

<!-- تضمين CSS الخاص -->
<link href="styles.css" rel="stylesheet">



<!-- Vendor CSS Files -->
<link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="../../../assets/css/style.css" rel="stylesheet">


<link href="../../../assets/css/nav_css/style.css" rel="stylesheet">

';
}


?>