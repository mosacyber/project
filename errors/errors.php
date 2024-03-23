<?php 
if (isset($errors) && is_array($errors) && count($errors) > 0): ?>
    <!-- تصميم مربع الأخطاء -->
    <div class="alert alert-danger">
        تنبيه
        <hr>
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>