

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
						<?php echo e(__('Contact')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Contact')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

    <!-- Contact Us Area Start -->
	<section class="contact-us">
		<div class="container">
			<div class="row ">
				<div class="col-lg-7">
					<div class="left-area">
						<div class="contact-form">
							<form action="<?php echo e(route('front.contact.submit')); ?>" method="POST">
								<?php echo csrf_field(); ?>
								<ul>
									<li>
										<input type="text" name="name" class="input-field" placeholder="<?php echo e(__('Name')); ?> *">
									</li>
									<li>
										<input type="email" name="email" class="input-field" placeholder="<?php echo e(__('Email Address')); ?> *">
									</li>
									<li>
										<input type="number" name="phone" class="input-field" placeholder="<?php echo e(__('Phone Number')); ?> *">
									</li>
									<li>
										<textarea name="message" class="input-field textarea" placeholder="<?php echo e(__('Your Message')); ?> *"></textarea>
									</li>
								</ul>
								<button class="submit-btn mybtn1" type="submit"><?php echo e(__('Send Message')); ?></button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-5 align-self-center">
					<div class="right-area">
						<div class="contact-info">
							<div class="left ">
									<div class="icon">
										<i class="fas fa-envelope"></i>
									</div>
							</div>
							<div class="content">
									<h4 class="title">
										<?php echo e(__('Email')); ?>

									</h4>
									<?php
										$email = explode( ',', $commonsetting->email );
										for ($i=0; $i < count($email); $i++) { 
											echo '<a href="mailto:'.$email[$i].'">'.$email[$i].'</a>';
										}
									?>
							</div>
                        </div>
                        <div class="contact-info">
							<div class="left ">
									<div class="icon">
										<i class="fas fa-phone"></i>
									</div>
							</div>
							<div class="content">
									<h4 class="title">
										<?php echo e(__('Phone')); ?>

									</h4>
									<?php
										$number = explode( ',', $commonsetting->number );
										for ($i=0; $i < count($number); $i++) { 
											echo '<a href="tel:'.$number[$i].'">'.$number[$i].'</a>';
										}
									?>
							</div>
						</div>
						<div class="contact-info">
							<div class="left ">
									<div class="icon">
										<i class="fas fa-map-marker-alt"></i>
									</div>
							</div>
							<div class="content">
									<h4 class="title">
										<?php echo e(__('Location')); ?> 
									</h4>
										<?php echo e($setting->address); ?>

							</div>
						</div>
						
						<div class="social-links">
							<h4 class="title"><?php echo e(__('Find us here :')); ?></h4>
							<ul>
								<?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="<?php echo e($social->url); ?>">
										<i class="<?php echo e($social->icon); ?>"></i>
									</a>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact Us Area End-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/contact.blade.php ENDPATH**/ ?>