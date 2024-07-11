<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Profile</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script src="<?php echo e(asset('js/seller/showClients.js')); ?>"></script>
</head>
<body>

<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Seller Home'); ?>
<?php $__env->startSection('content'); ?>


<div id="clientDetailsTable" class="table-responsive dataTables_wrapper dt-bootstrap4 no-footer">
    <table id="clienttable" class="table table-striped table-hover">
            <thead>   
                <tr role="row">
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
        </thead>
        <tbody id="clientbody">
            <td>
            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#clientModal">Edit<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>                                                        -->
            </td>
        </tbody>
    </table>


    <!-- Modal for editing client details -->
<div id="clientModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="clientForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" id="clientUpdate" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

    
</body>
</html>
<?php echo $__env->make('seller.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xammmppp\htdocs\adwebproj\resources\views/seller/index.blade.php ENDPATH**/ ?>