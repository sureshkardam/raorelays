<?php $__env->startSection('content'); ?>

<style type="text/css">
    .card-here .card-left-icon svg {
    margin-top: 10px;
}
</style>

 <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Sales User Dashboard</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Dashboard</a></li>
                    </ul>
                   
                </div>
                <div class="content-main-here">




                    <div class="table-main-div">
                        <div class="table-header">
                            <h2><strong>Dashboard</strong></h2>
                        </div>
                        <div class="tableBody">
                            <div class="table-responsive">
                          
          


   <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?>
                                    
 
		<p>Coming Soon</p>
                        
                    
                    </div>
                </div>
            </div>
        </div>
       
<style>
.four-blocks + .four-blocks {
    margin-top: 30px;
}
</style>          
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/production-user/index.blade.php ENDPATH**/ ?>