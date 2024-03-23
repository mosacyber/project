<?php

echo'




<!-- إضافة مكتبة jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-nlTQm9jZ9raA8qk4Mk4pGvS2Zz5cDgKPzFDLW1WWCJo=" crossorigin="anonymous"></script>




<!-- Filter Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">تصفية البيانات</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-funnel"></i> فلترة</button>

            <div class="modal-body">
              <!--   دفعة 
                <div class="form-group">
                    <label for="range_05"><b>دفعة</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentOption" id="allPayments" value="allPayments" checked>
                        <label class="form-check-label" for="allPayments">جميع الدفعات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentOption" id="specificPayment" value="specificPayment">
                        <label class="form-check-label" for="specificPayment">تحديد نطاق الدفعة</label>
                    </div>
                    نطاق الدفعة 
                    <input type="text" id="range_05" class="form-control" style="display: none;">
                </div>
-->
<!-- اختيار الكلية -->
<div class="form-group">
    <label for="college">اختر الكلية:</label>
    <select class="form-control" id="college" name="college" onchange="updatePrograms()">
        <option value="">حدد الكلية</option>
        <option value="allk">جميع الكليات</option>
        <!-- تحميل الكليات من ملف JSON -->
    </select>
</div>

<script>
    // تحميل محتوى ملف JSON
    fetch("data.json")
        .then(response => response.json())
        .then(data => {
            // ملء قائمة الكليات بالبيانات المستردة من ملف JSON
            const colleges = data.k;
            const collegeSelect = document.getElementById("college");

            colleges.forEach(college => {
                const option = document.createElement("option");
                option.value = college.College_ID;
                option.textContent = college.College_Name;
                collegeSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
</script>


<!-- اختيار القسم -->
<div class="form-group" id="programGroup" style="display: none;">
    <label for="program">اختر القسم:</label>
    <select class="form-control" id="program" name="program">
        <option value="">حدد القسم</option>
        <option value="allq">جميع الاقسام</option>
        <!-- قائمة البرامج ستتم إضافتها هنا تلقائياً -->
    </select>
</div>







                <!-- اختيار البرنامج -->
                <div class="form-group" id="specializationGroup" style="display: none;">
                <label for="specialization">اختر البرنامج:</label>
                <select class="form-control" id="specialization" name="specialization">
                    <option value="">حدد البرنامج</option>
                        <option value="allt">جميع البرامج</option>
                    </select>
                </div>

              <!-- خيارات المرشحات -->
              <div class="form-check" id="filterOptions" >
                    <input class="form-check-input" type="radio" name="filterOption" value="accounProgram_ID43" id="filterOption1">
                    <label class="form-check-label" for="filterOption1">ذكر</label>
                    <label class="form-check-label" for="filterOption1">انثى</label>
                </div>
                <div class="form-check" id="filterOptions">
                    <input class="form-check-input" type="radio" name="filterOption2" value="allData" id="filterOption2" >
                    <label class="form-check-label" for="filterOption2">مسح كل الفلاتر</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary" id="applyFilterBtn">تطبيق</button>
            </div>
        </div>
    </div>
</div>
<!-- End Filter Modal -->





';


?>