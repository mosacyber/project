<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../assets/css_rtl/bootstrap.min.css" />

  <!-- style css File RTL-->
  <link rel="stylesheet" href="../../assets/css_rtl/style.css" />

  <!-- style css File Ltr-->
  <!-- <link rel="stylesheet" href="../css_ltr/style.css" /> -->

  <!-- Title Icon -->
  <link rel="icon" href="../../assets/img/fav-icon.png" />

  <title>التصفية</title>
</head>

<body>
  <!-- Start Overlay Mobile -->
  <div class="overlay"></div>
  <!-- End Overlay Mobile -->

  <!-- Start Navbar -->
  <!-- End Navbar -->

  <!-- Start Filter -->
  <div class="container">
    <div class="filter-top">
      <h3 class="choose-filter">اختر نوع التصفية</h3>
      <span class="close"></span>
    </div>
    <div class="filter-container">
      <div class="filter by-category">
        <h3 class="filter-title">حسب الفئة</h3>
        <div class="btns">
          <label for="1">
            <span class="text">الهواتف الذكية</span>
            <input type="checkbox" name="" id="1">
            <span class="bg"></span>
          </label>
          <label for="2">
            <span class="text">أغطية الحماية</span>
            <input type="checkbox" name="" id="2">
            <span class="bg"></span>
          </label>
          <label for="3">
            <span class="text">كروت الذاكرة</span>
            <input type="checkbox" name="" id="3">
            <span class="bg"></span>
          </label>
          <label for="4">
            <span class="text">الكمبيوتر</span>
            <input type="checkbox" name="" id="4">
            <span class="bg"></span>
          </label>
          <label for="5">
            <span class="text">السماعات</span>
            <input type="checkbox" name="" id="5">
            <span class="bg"></span>
          </label>
          <label for="6">
            <span class="text">هاردات تخزين خارجية</span>
            <input type="checkbox" name="" id="6">
            <span class="bg"></span>
          </label>
          <label for="7">
            <span class="text">الأجهزة اللوحية</span>
            <input type="checkbox" name="" id="7">
            <span class="bg"></span>
          </label>
          <label for="8">
            <span class="text">الكابلات</span>
            <input type="checkbox" name="" id="8">
            <span class="bg"></span>
          </label>
          <label for="9">
            <span class="text">أجهزة الأنترنت والراوتر</span>
            <input type="checkbox" name="" id="9">
            <span class="bg"></span>
          </label>
          <label for="10">
            <span class="text"> ماوس وكيبورد</span>
            <input type="checkbox" name="" id="10">
            <span class="bg"></span>
          </label>
          <label for="11">
            <span class="text">الشواحن</span>
            <input type="checkbox" name="" id="11">
            <span class="bg"></span>
          </label>
          <label for="12">
            <span class="text">جرافيك تابلت</span>
            <input type="checkbox" name="" id="12">
            <span class="bg"></span>
          </label>
          <label for="13">
            <span class="text">حوامل الجوال</span>
            <input type="checkbox" name="" id="13">
            <span class="bg"></span>
          </label>

        </div>
      </div>
      <div class="line"></div>
      <div class=" filter by-price">
        <h3 class="filter-title">حسب السعر</h3>
        <div class="btns">
          <label for="all">
            <span class="text">الكل</span>
            <input type="checkbox" name="" id="all">
            <span class="bg"></span>
          </label>
          <label for="liss-500">
            <span class="text">أقل من 500 ريال</span>
            <input type="checkbox" name="" id="liss-500">
            <span class="bg"></span>
          </label>
          <label for="from-500-to-1000">
            <span class="text">  من 500 إلى 1000  </span>
            <input type="checkbox" name="" id="from-500-to-1000">
            <span class="bg"></span>
          </label>
          <label for="from-1000-to-2000">
            <span class="text">  من 1000 إلى 2000  </span>
            <input type="checkbox" name="" id="from-1000-to-2000">
            <span class="bg"></span>
          </label>
          <label for="from-2000-to-4000">
            <span class="text">  من 2000 إلى 4000  </span>
            <input type="checkbox" name="" id="from-2000-to-4000">
            <span class="bg"></span>
          </label>
          <label for="large-4000">
            <span class="text"> أكبر من 4000</span>
            <input type="checkbox" name="" id="large-4000">
            <span class="bg"></span>
          </label>
     
        </div>
        <div class="price">
          <h3 class="filter-title price mt-4"> السعر<span>(ريال سعودى)</span></h3>
          <!-- ======== -->

          <div class="wrapper">
            
      
            <div class="slider">
              <div class="progress"></div>
            </div>
            <div class="range-input">
              <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
              <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
            </div>
             <div class="price-input">
              <div class="field">
                <input type="number" class="input-min" value="2500">
               
              </div>
          
              <div class="field">
                <input type="number" class="input-max" value="7500">
               
              </div>
            </div>
          </div>

          <!-- ======== -->

        </div>
      </div>

    </div>
    <div class="filter-container">
      <div class="filter by-category">
        <h3 class="filter-title">حسب معدل التقييمات</h3>
        <div class="btns">
          <label for="+5">
            <span class="text">+5 نجوم</span>
            <input type="checkbox" name="" id="+5">
            <span class="bg"></span>
          </label>
          <label for="+4">
            <span class="text">+4 نجوم</span>
            <input type="checkbox" name="" id="+4">
            <span class="bg"></span>
          </label>
          <label for="+3">
            <span class="text">+3 نجوم</span>
            <input type="checkbox" name="" id="+3">
            <span class="bg"></span>
          </label>
          <label for="+2">
            <span class="text">+2 نجوم</span>
            <input type="checkbox" name="" id="+2">
            <span class="bg"></span>
          </label>
          <label for="+1">
            <span class="text">+1 نجوم</span>
            <input type="checkbox" name="" id="+1">
            <span class="bg"></span>
          </label>

        </div>
      </div>
      <div class="line"></div>
      <div class=" filter by-brand">

        <div class="price">
          <h3 class="filter-title price"> حسب العلامة التجارية</h3>
          <div class="btns">
            <label for="apple">
              <span class="text">أبل</span>
              <input type="checkbox" name="" id="apple">
              <span class="bg"></span>
            </label>
            <label for="samsung">
              <span class="text">سامسونج</span>
              <input type="checkbox" name="" id="samsung">
              <span class="bg"></span>
            </label>
            <label for="oppo">
              <span class="text">أوبو</span>
              <input type="checkbox" name="" id="oppo">
              <span class="bg"></span>
            </label>
            <label for="nokia">
              <span class="text">نوكيا</span>
              <input type="checkbox" name="" id="nokia">
              <span class="bg"></span>
            </label>
            <label for="huway">
              <span class="text">هاواوي</span>
              <input type="checkbox" name="" id="huway">
              <span class="bg"></span>
            </label>
            <label for="honer">
              <span class="text">هونور</span>
              <input type="checkbox" name="" id="honer">
              <span class="bg"></span>
            </label>
            <label for="relmy">
              <span class="text">ريلمي</span>
              <input type="checkbox" name="" id="relmy">
              <span class="bg"></span>
            </label>
            <label for="infinex">
              <span class="text">انفينكس</span>
              <input type="checkbox" name="" id="infinex">
              <span class="bg"></span>
            </label>
            <label for="xiaomi">
              <span class="text">شاومي</span>
              <input type="checkbox" name="" id="xiaomi">
              <span class="bg"></span>
            </label>
            <label for="sony">
              <span class="text">سوني</span>
              <input type="checkbox" name="" id="sony">
              <span class="bg"></span>
            </label>
            <label for="lenovo">
              <span class="text">لينوفو</span>
              <input type="checkbox" name="" id="lenovo">
              <span class="bg"></span>
            </label>
            <label for="lg">
              <span class="text">إل جي</span>
              <input type="checkbox" name="" id="lg">
              <span class="bg"></span>
            </label>
            <label for="del">
              <span class="text">ديل </span>
              <input type="checkbox" name="" id="del">
              <span class="bg"></span>
            </label>
            <label for="hp">
              <span class="text">اتش بي </span>
              <input type="checkbox" name="" id="hp">
              <span class="bg"></span>
            </label>
            <label for="msi">
              <span class="text">ام أس أي  </span>
              <input type="checkbox" name="" id="msi">
              <span class="bg"></span>
            </label>
          </div>
        </div>
      </div>

    </div>
    <button class="filter-apply">تطبيق</button>
  </div>
  <!-- End Filter -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Best Seller Slider -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="../js/bestSellerSlider.js"></script>
  <!--Bootstrap  -->
  <script src="../js/bootstrap.bundle.min.js"></script>

  <!-- javascript file -->
  <script src="../js/script.js"></script>
</body>

</html>