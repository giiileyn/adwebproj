<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Client</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <scrip   t src="<?php echo e(asset('js/client/signup.js')); ?>"></script>

</head>
<body>
    <!-- Form content -->
    <form id="signupForm">
        <?php echo csrf_field(); ?>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div>
            <label for="picture">Picture</label>
            <input type="file" id="picture" name="picture">
        </div>
        <button type="submit">Sign Up</button>
    </form>


</body>
</html>
<?php /**PATH D:\xammmppp\htdocs\adwebproj\resources\views/client/auth/signup.blade.php ENDPATH**/ ?>