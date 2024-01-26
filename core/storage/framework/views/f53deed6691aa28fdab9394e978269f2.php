

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
						<?php echo e(__('Team')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Team')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <!--Main Breadcrumb Area End -->
    
	<!-- Team Area Start -->
	<section class="team team-page">
		<div class="container">
			<div class="row">
				<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 col-md-6">
					<div class="team-member">
						<div class="member-pic">
						<img src="<?php echo e(asset('assets/front/img/'.$team->image)); ?>" alt="">
						</div>

						<div class="social">
							<ul>
								<?php if($team->url1 && $team->icon1): ?>
								<li>
									<a href="<?php echo e($team->url1); ?>">
										<i class="<?php echo e($team->icon1); ?>"></i>
									</a>
								</li>
								<?php endif; ?>
								<?php if($team->url2 && $team->icon2): ?>
								<li>
									<a href="<?php echo e($team->url2); ?>">
										<i class="<?php echo e($team->icon2); ?>"></i>
									</a>
								</li>
								<?php endif; ?>
								<?php if($team->url3 && $team->icon3): ?>
								<li>
									<a href="<?php echo e($team->url3); ?>">
										<i class="<?php echo e($team->icon3); ?>"></i>
									</a>
								</li>
								<?php endif; ?>
							</ul>
						</div>

						<div class="member-data">
						<div class="name">
							<h4 class="title"><?php echo e($team->name); ?></h4>
							<p class="position"><?php echo e($team->dagenation); ?></p>
						</div>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="d-inline-block">
						<?php echo e($teams->links()); ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Team Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/team.blade.php ENDPATH**/ ?>