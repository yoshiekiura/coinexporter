<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('dashboard.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>   

            
    <!-- Page Header -->
	<div class="page-header">
		<div class="card breadcrumb-card">
			<div class="row justify-content-between align-content-between" style="height: 100%;">
				<div class="col-md-6">
					<h3 class="page-title"><?php echo e(__('dashboard.title')); ?></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item active-breadcrumb">
							<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3">
					
				</div>
			</div>
		</div><!-- /card finish -->	
	</div><!-- /Page Header -->

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-primary border-primary">
                            <i class="fe fe-users"></i>
                        </span>
                        <div class="dash-count">
                            <h3>15</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Users</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-success">
                            <i class="fe fe-credit-card"></i>
                        </span>
                        <div class="dash-count">
                            <h3>10</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        
                        <h6 class="text-muted">Admin</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-danger border-danger">
                            <i class="fe fe-money"></i>
                        </span>
                        <div class="dash-count">
                            <h3>475</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        
                        <h6 class="text-muted">Appointment</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-warning border-warning">
                            <i class="fe fe-folder"></i>
                        </span>
                        <div class="dash-count">
                            <h3>$6523</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        
                        <h6 class="text-muted">Revenue</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            

<?php $__env->stopSection(); ?>




<?php $__env->startPush('css'); ?>
	
    
    <style type="text/css">
    	.card{
    		background-color: #fff;
    	}
    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH \\BINAYAK\COINEXPORTER\admin\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>