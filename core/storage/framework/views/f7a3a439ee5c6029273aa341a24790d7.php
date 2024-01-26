

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
						<?php echo e(__('Media')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Media')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

<!-- Media Area Start -->
	<section class="media-page">
	<div class="container mt-5 pt-3">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading">
						<h2 class="title">
						<?php echo e($sectionInfo->media_zone_title); ?>

						</h2>
						<p class="text">
						<?php echo e($sectionInfo->media_zone_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
                <?php $__currentLoopData = $mediazones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mediazone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-6">
					<a href="<?php echo e($mediazone->link); ?>" class="single-service media d-block" target="_blank">
						<div class="left-area">
								<img src="<?php echo e(asset('assets/front/img/'.$mediazone->icon)); ?>" alt="">
						</div>
						<div class="right-area">
							<h4 class="title">
								<?php echo e($mediazone->name); ?>

							</h4>
						</div>
					</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>


		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($sectionInfo->entertainment_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->entertainment_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
                <?php $__currentLoopData = $entertainments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entertainment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-6">
					<div class="single-service entertainment">
						<div class="left-area">
							<img src="<?php echo e(asset('assets/front/img/'.$entertainment->icon)); ?>" alt="">
						</div>
						<div class="right-area">
							<h4 class="title">
								<?php echo e($entertainment->counter); ?><?php echo e(__('+')); ?>

							</h4>
							<p class="sub-title"><?php echo e($entertainment->name); ?></p>
						</div>
					</div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
		
	</section>
<!-- Media Area End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/media.blade.php ENDPATH**/ ?>