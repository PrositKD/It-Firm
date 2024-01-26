

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
						<?php echo e(__('Package')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Package')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <!--Main Breadcrumb Area End -->
    
	<!-- Pricingplan Area Start -->
	<section class="pricingPlan-section packag-page">
		<div class="container">
			<div class="row justify-content-center">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-price">
                        <h4 class="name">
                            <?php echo e($plan->name); ?>

                        </h4>
                        <div class="mbps">
                            <?php echo e($plan->speed); ?> <span><?php echo e(__('Mbps')); ?></span>
                        </div>
                            
                            
                        <div class="list">
                            <?php
								$feature = explode( ',', $plan->feature );
								for ($i=0; $i < count($feature); $i++) { 
									echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
								}
							?>
                        </div>
                        <div class="bottom-area">
                            <div class="price-area">
								<div class="price-top-area">
									<?php if($plan->discount_price == null): ?>
										<p class="price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($plan->price); ?></p>
									<?php else: ?>
										<p class="discount_price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($plan->discount_price); ?></p>
										<p class="price discounted"><del><?php echo e(Helper::showCurrency()); ?><?php echo e($plan->price); ?></del></p>
									<?php endif; ?>
								</div>
								<p class="time">
									<?php echo e($plan->time); ?>

								</p>
							</div>
                            <?php if(Auth::user()): ?>
									<a href="<?php echo e(route('front.packagecheckout', $plan->id)); ?>" class="mybtn1"><?php echo e(__('Get Start')); ?></a>
									<?php else: ?>
									<a href="<?php echo e(route('user.login')); ?>" class="mybtn1"><?php echo e(__('Get Start')); ?></a>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<!-- Pricingplan Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/package.blade.php ENDPATH**/ ?>