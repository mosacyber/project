
<?php 

echo '




<footer class="footer">
<div class="d-sm-flex justify-content-center justify-content-sm-between">
  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">الملكية الفكرية © 2024 <a href="https://mousacyber.com/" target="_blank">mousacyber</a>. جميع الحقوق محفوظة</span>
  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">موسى بارقي & صنع بحب <i class="far fa-heart text-danger"></i></span>
</div>
</footer>















'; ?><?php
$navbar_path = "tools/js.php";
for ($i = 0; $i < 9; $i++) {
$path = str_repeat("../", $i) . $navbar_path;
if (file_exists($path)) {
  include $path;
    break;
}
}
?>