<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <?php echo Form::open(array('route' => 'front.fb', 'class' => '')); ?>

    <div>
        <label  class="email">Your name</label>
            <?php echo Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"Your name"]); ?>

    </div><div>
        <label  class="email">Your email</label>
            <?php echo Form::text('email', null, ['class' => 'input-text', 'placeholder'=>"Your email"]); ?>

    </div><div>
        <label class="email">Comments</label>
            <?php echo Form::textarea('comment', null, ['class' => 'tarea', 'rows'=>"5"]); ?>

    </div><div class="send">
        <?php echo Form::submit('Send', ['class' => 'button']); ?>

    </div>
    <?php echo Form::close(); ?>

</body>
</html>
<?php /**PATH E:\BANTHUCAN\resources\views/fontmail.blade.php ENDPATH**/ ?>