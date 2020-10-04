<p>Xin Chào,  <?php echo e($data['name']); ?></p> <br>
<p>Cảm ơn bạn đã tin tưởng đặt thức ăn ở cửa hàng 
chúng tôi</p>
<P>Dưới đây là thông tin của bạn:</P>
<ul>
<li>
    <div>
        Tên: <?php echo e($data['name']); ?> <br>
        Số điện thoại: <?php echo e($data['phone']); ?> <br>
        Địa chỉ giao hàng: <?php echo e($data['address']); ?>

    </div>
</li>
</ul>
<h1>Dưới đây là các mặt hàng của bạn:</h1>
<ul>
<?php $__currentLoopData = $data['cart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
    <div>
        Tên hàng: <?php echo e($item->name); ?> <br>
        Số lượng: <?php echo e($item->qty); ?> <br>
        Tổng tiền: <?php echo e(Cart::subtotal()); ?> $
    </div>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH E:\BANTHUCAN\resources\views/dynamic_email.blade.php ENDPATH**/ ?>