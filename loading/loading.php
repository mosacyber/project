<?php


echo '
<div id="splashScreen" class="splash-screen" style="display:none;">
    <div id="loading-test-5">
        <div class="loading" data-mdb-parent-selector="#loading-test-5">
            <div class="fas fa-spinner fa-spin"></div>
            <span class="loading-text">جارٍ التحميل...</span>
        </div>
    </div>
</div>

<script src="jquery.min.js"></script>
<script>
    // انتظر حتى يتم تحميل الصفحة بالكامل
    $(document).ready(function() {
        // عرض شاشة البداية
        $("#splashScreen").fadeIn();
        
        // قم بإخفاء شاشة البداية بعد 3 ثواني
        setTimeout(function() {
            $("#splashScreen").fadeOut();
        }, 700);
    });
</script>
';

?>