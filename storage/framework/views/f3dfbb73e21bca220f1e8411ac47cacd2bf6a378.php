<html>
    <body>
     <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p>This is user <?php echo e($user->foodname); ?></p>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </body>
</html><?php /**PATH E:\BANTHUCAN\resources\views/test.blade.php ENDPATH**/ ?>