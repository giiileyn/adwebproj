
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script src="<?php echo e(asset('js/admin/signin.js')); ?>"></script>
    <title>Login</title>
</head>
<body>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Login</h2>
    </div>
    <form id="signinForm">
        <?php echo csrf_field(); ?>

        <div class="input-group custom">
            <input type="email" class="form-control form-control-lg" placeholder="name@gmail.com" name="email" id="email" >
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div>
        </div>
        <div class="d-block text-danger" id="email_error"></div>

        <div class="input-group custom">
            <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" id="password">
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        <div class="d-block text-danger" id="password_error"></div>

       
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-0">
                    <button type="submit"  class="btn btn-primary btn-lg btn-block">Sign In</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Include jQuery and your custom JS file -->
<!-- <script>
    const loginUrl = '<?php echo e(url('/sellers/login')); ?>';
</script> -->
</body>
</html>
<?php /**PATH D:\xammmppp\htdocs\adwebproj\resources\views/admin/auth/signin.blade.php ENDPATH**/ ?>