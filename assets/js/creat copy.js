


            ////////////      التحقق من الرقم الجامعي او الوظيفي        ///////////////
            document.getElementById('accountID').addEventListener('input', function() {
                // قم بجلب قيمة حقل الرقم الجامعي أو الوظيفي
                var accountIDValue = this.value;                                 
            
                // قم بتنفيذ التحقق من القيمة أو إرسالها إلى السيرفر للتحقق
                // في هذا المثال، نقوم بفحص إذا كانت القيمة غير فارغة وتحقق من نوعها
                if (accountIDValue !== '' && !isNaN(accountIDValue)) {
                    // تحقق من عدد الأرقام
                    if (accountIDValue.toString().length === 9) {
                    // قم بتنفيذ أي تحقق إضافي هنا
            
                    // إذا تم تحقق جميع الشروط، يمكنك تحديث رسالة التحقق
                    document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: green;">تم التحقق بنجاح!</div>';
                    // تحديد الزر   
                    var inputElement = document.getElementById('accountID');
                    inputElement.style.border = '1px solid green'; // يمكنك تغيير 'green' إلى لون الحدود الذي تفضله
            
                    } else if (accountIDValue.toString().length < 9) {
                    // إذا كان عدد الأرقام أقل من 9، قم بتحديث رسالة التحقق
                    document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: red;">الرجاء إكمال رقم الجامعي حتى 9 أرقام.</div>';
                        // تحديد الزر   
                        var inputElement = document.getElementById('accountID');
                    inputElement.style.border = '1px solid maroon'; // يمكنك تغيير 'green' إلى لون الحدود الذي تفضله
                    } else {
                    // إذا كان عدد الأرقام أكثر من 9، يمكنك تنفيذ إجراء آخر إذا لزم الأمر
                    document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: red;">رقم الجامعي يجب أن يكون 9 أرقام.</div>';
                                // تحديد الزر   
                                var inputElement = document.getElementById('accountID');
                    inputElement.style.border = '1px solid maroon'; // يمكنك تغيير 'green' إلى لون الحدود الذي تفضله
                    }
                } else {
                    // في حالة فشل التحقق، قم بتحديث رسالة الخطأ
                    document.getElementById('accountIDValidationMessage-accountID').innerHTML = '<div style="color: red;">الرجاء إدخال رقم جامعي صحيح.</div>';
                            // تحديد الزر   
                            var inputElement = document.getElementById('accountID');
                    inputElement.style.border = '1px solid maroon'; // يمكنك تغيير 'green' إلى لون الحدود الذي تفضله
                }           
                });
            
            // إضافة حدث click على الزر الآخر
            document.getElementById('accountID').addEventListener('click', function() {
                // تحديد الزر
                var inputElement = document.getElementById('accountID');
                // قراءة قيمة الحدود الحالية
                var currentBorderStyle = inputElement.style.border;
            
                // قراءة لون الخلفية الحالي للجسم
                var bodyBackgroundColor = getComputedStyle(document.body).getPropertyValue('--app-container').trim();
            
                if( bodyBackgroundColor === '#f3f6fd'){
                // تحديد الحدود بناءً على القيم الحالية
                if (currentBorderStyle === '1px solid maroon') {
                    inputElement.style.border = '1px solid maroon';
                    inputElement.style.backgroundColor  = ' #fff';
                } else if (currentBorderStyle === '1px solid green') {
                    inputElement.style.border = '1px solid green';
                    inputElement.style.backgroundColor  = ' #fff';
                } else { 
                    // في حالة عدم وجود حدود، قم بتحديد حدود جديدة
                    inputElement.style.border = '1px solid #aeaeae';
                    inputElement.style.backgroundColor  = ' #fff';
                }
                }else{
                        // تحديد الحدود بناءً على القيم الحالية
                if (currentBorderStyle === '1px solid maroon') {
                    inputElement.style.backgroundColor  = ' maroon';
                } else if (currentBorderStyle === ' green') {
                    inputElement.style.backgroundColor  = '1px solid green';
                } else {
                    // في حالة عدم وجود حدود، قم بتحديد حدود جديدة
                    inputElement.style.backgroundColor  = ' #aeaeae';
                }
                }
            });
            
            
            
            
            
            
            
                // إضافة حدث click على الزر الآخر
                document.getElementById('accountID').addEventListener('click', function() {
                //  رسالة التحقق بنجاح عند النقر على الزر الخاص بالاسم الأول (accountID)
                document.getElementById('accountIDValidationMessage-accountID').style.display = 'block'; });
                // إضافة حدث click على الزر الآخر
                document.getElementById('FName').addEventListener('click', function() {
                // إخفاء رسالة التحقق بنجاح عند النقر على الزر الخاص بالاسم الأول (FName)
                document.getElementById('accountIDValidationMessage-accountID').style.display = 'none';
                var accountIDElement = document.getElementById('accountID');            
if (accountIDElement && accountIDElement.style.border === '1px solid green') {
    document.querySelector('.submit-btn').removeAttribute('disabled');
}
});
///////////////////////// النهاية ///////////////////////
            
            
            
            
                                                            
