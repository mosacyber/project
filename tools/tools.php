<?php


function download_css() {

echo'
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  height: 95px;
  width: 360px;
  background: #7d2ae8;
  border-radius: 55px;
  cursor: pointer;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  overflow: hidden;
}
.button.active {
  height: 20px;
  width: 500px;
}
.button::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  height: 100%;
  width: 100%;
  background: #5b13b9;
  border-radius: 55px;
  transition: all 6s ease-in-out;
}
.button.active::before {
  animation: layer 6s ease-in-out forwards;
}
@keyframes layer {
  100% {
    left: 0%;
  }
}
.button .content {
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s ease;
  transition-delay: 0.2s;
}
.button.active .content {
  transform: translateY(60px);
}
.button .content i,
.button .content .button-text {
  color: #fff;
  font-size: 40px;
  font-weight: 500;
}
.button .content .button-text {
  font-size: 28px;
  margin-left: 8px;
}











';//هذا حق شعار الموقع
echo'

.navbar.default-layout-navbar .navbar-brand-wrapper .navbar-brand img {
  width: calc(134px - 100px);
  max-width: 100%;
  height: 100%;
  margin: auto;
  vertical-align: middle;
}
';
}
function print_css() {

echo'

';
}





function download_js() {
  echo '
  <!--downloadData-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script>
  const button = document.querySelector(".button");
  button.addEventListener("click", () => {
      button.classList.add("active");


      setTimeout(() => {
          button.classList.remove("active");
          button.querySelector("i").classList.replace("bx-cloud-download", "bx-check-circle");
          button.querySelector("span").innerText = "Completed";



          // عند الانتهاء، قم بتنزيل الملف
          downloadData();
      }, 6000);
  });

  function downloadData() {
      
    var downloadButton = document.getElementById("downloadButton");
    var loadingIndicator = document.getElementById("loadingIndicator");      
    // إظهار عنصر عرض التحميل وإخفاء زر التنزيل
    downloadButton.style.display = "none";
    loadingIndicator.style.display = "inline-block";




      setTimeout(function () {
          var table = document.querySelector("table"); // تحديد الجدول بواسطة العنصر table فقط
          var rows = table.querySelectorAll("tr");
          var csv = [];

          for (var i = 0; i < rows.length; i++) {
              var row = [], cols = rows[i].querySelectorAll("td, th");

              for (var j = 0; j < cols.length; j++) {
                  row.push(cols[j].innerText);
              }

              csv.push(row.join(","));
          }

          var csvContent = csv.join("\\n");
          var blob = new Blob([csvContent], { type: "text/csv;charset=utf-8" });
          var url = window.URL.createObjectURL(blob);


          // إعادة إظهار زر التنزيل وإخفاء عنصر عرض التحميل
          loadingIndicator.style.display = "none";
          downloadButton.style.display = "inline-block";
  



          // إنشاء عنصر رابط وتنزيل الملف
          var a = document.createElement("a");
          a.href = url;
          a.download = "data.csv";
          document.body.appendChild(a);
          a.click();
          window.URL.revokeObjectURL(url);
      }, 3000); // انتظر 3 ثواني قبل تنزيل الملف
  }
</script>
  <!--downloadData-->
  ';
  
  }
  


  function footer_css() {
    echo '
 body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.footer {
  width: 100%;
  background-color: #f8f9fa;
  padding: 20px 0;
  position: fixed;
  bottom: 0;
}';
}



  function print_js() {

  echo '
<script type="text/javascript">
function printRecord(accountID) {
    // إخفاء زر الطباعة لتجنب إعادة الطباعة
    var printButton = document.querySelector("button[onclick=\'printRecord(" + accountID + ")\']");
    if (printButton) {
        printButton.style.display = "none";
    }
    
    // إخفاء جميع العناصر الأخرى غير الجدول
    var elementsToHide = document.querySelectorAll("body > :not(table)");
    for (var i = 0; i < elementsToHide.length; i++) {
        elementsToHide[i].style.display = "none";
    }
    
    // طباعة الجدول المعني
    var printContents = document.querySelector("table");
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents.outerHTML;
    window.print();
    document.body.innerHTML = originalContents;
    
    // إظهار العناصر التي تم إخفاؤها مرة أخرى
    for (var i = 0; i < elementsToHide.length; i++) {
        elementsToHide[i].style.display = "";
    }
    
    // إظهار زر الطباعة مرة أخرى بعد الطباعة
    if (printButton) {
        printButton.style.display = "";
    }
}
</script>
';
}







?>