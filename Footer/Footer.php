
<?php 

echo '

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-shape"></div>
            </div>
        </div>
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