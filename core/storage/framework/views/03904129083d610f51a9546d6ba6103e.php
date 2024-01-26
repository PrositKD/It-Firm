

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
						<?php echo e($service->name); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="<?php echo e(route('front.service')); ?>">
								<?php echo e(__('Service')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e($service->name); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

    <!-- Faq Area Start -->
	<section class="service-area service-page">
        <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="category-widget">
                    <h4><?php echo e(__('Services')); ?></h4>
                  <ul class="category-list">
                    <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <a href="<?php echo e(route('front.service.details', $data->slug)); ?>" class="<?php if($service->id == $data->id ): ?> active  <?php endif; ?>">
                        <i class="fas fa-angle-double-right"></i><?php echo e($data->name); ?> 
                      </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
                <div class="get-support">
                  <i class="fas fa-headset"></i>
                  <h4><?php echo e(__('Live Support')); ?></h4>
                  <?php
                    $number = explode( ',', $commonsetting->number );
                    for ($i=0; $i < count($number); $i++) { 
                      echo '<p class="number">'.$number[$i].'</p>';
                    }
                  ?>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="service-content-wrapper">
                  <div class="main-image">
                    <img src="<?php echo e(asset('assets/front/img/'.$service->image)); ?>" alt="">
                  </div>
                  <div class="content">
  
                    <h3 class="title"><?php echo e($service->name); ?></h3>
                    <?php echo $service->content; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</section>
	<!-- Faq Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/service-details.blade.php ENDPATH**/ ?>