

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
						<?php echo e(__('About')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('About')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

	<!-- About Area Start -->
	<section class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 align-self-center">
					<div class="section-heading">
						<h4 class="title">
							<?php echo e($sectionInfo->about_title); ?>

						</h4>
						<p class="text">
							<?php echo $sectionInfo->about_subtitle; ?>

						</p>
						<ul class="list">
							<?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<p><?php echo e($about->feature); ?></p>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 align-self-center">
					<div class="right-images">
						<img  src="<?php echo e(asset('assets/front/img/'.$sectionInfo->about_image)); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- About Area End -->
    
	
	<!-- Counter Area Start -->
	<section class="counter-section"  
	<?php if($commonsetting->is_counter_bg): ?>
	style="background-image : url('<?php echo e(asset('assets/front/img/' . $sectionInfo->funfact_bg)); ?>')"
	<?php endif; ?>
	>
	<?php if($commonsetting->is_counter_bg): ?>
		<div class="overlay"></div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<?php $__currentLoopData = $funfacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funfact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-counter">
							<div class="icon">
								<img src="<?php echo e(asset('assets/front/img/'.$funfact->icon)); ?>" alt="">
							</div>
							<div class="content">
								<h4><?php echo e($funfact->value); ?></h4>
								<p><?php echo e($funfact->name); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<!-- Counter Banner Area End -->
	

	<!-- Offer Area Start -->
	<section class="offer-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($sectionInfo->offer_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->offer_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 align-self-center">
					<ul class="offer-list">
						<?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="content">
								<?php echo $offer->offer; ?>

							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<div class="offer-image">
						<img class="w-80" src="<?php echo e(asset('assets/front/img/'.$sectionInfo->offer_image)); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Offer Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/about.blade.php ENDPATH**/ ?>