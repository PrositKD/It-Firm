

<?php $__env->startSection('meta-keywords', "$setting->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$setting->meta_description"); ?>
<?php $__env->startSection('content'); ?>

	<!--Main Breadcrumb Area Start -->
	<div class="main-breadcrumb-area" style="background-image : url('<?php echo e(asset('assets/front/img/' . $commonsetting->breadcrumb_image)); ?>');">
        <div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						<?php echo e(__('Branch')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Branch')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

<!-- Branch Area Start -->
	<section class="branch-page">
		<div class="container">
			<div class="row">
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $branche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-6">
					<div class="single-branch">
						<?php echo $branche->iframe; ?>

						<div class="content">
							<div class="top-area">
								<div class="icon">
								<i class="fas fa-code-branch"></i>
								</div>
								<h4><?php echo e($branche->branch_name); ?></h4>
							</div>
							<ul>
								<li>
									<i class="fas fa-user-tie"></i>  <?php echo e($branche->manager); ?>

								</li>
								<li>
									<i class="fas fa-phone"></i> 
									<?php
										$phone = explode( ',', $branche->phone );
										for ($i=0; $i < count($phone); $i++) { 
											echo $phone[$i].', ';
										}
									?>
								</li>
								<li>
									<i class="fas fa-envelope"></i>
									<?php
										$email = explode( ',', $branche->email );
										for ($i=0; $i < count($email); $i++) { 
											echo $email[$i].', ';
										}
									?>
								</li>
								<li>
									<i class="fas fa-map-marker-alt"></i> <?php echo e($branche->address); ?> 
								</li>
							</ul>
						</div>
					</div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<!-- Branch Area End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/branch.blade.php ENDPATH**/ ?>