

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
						<?php echo e(__('Faq')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Faq')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

    <!-- Faq Area Start -->
	<section id="faq" class="faq">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
                <div class="panel-group accordion" id="accordion-1">
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 data-toggle="collapse" aria-expanded="<?php if($loop->first): ?> true <?php endif; ?>" data-target="#id<?php echo e($faq->id); ?>" aria-controls="id<?php echo e($faq->id); ?>"
                            class="panel-title">
                                <?php echo e($faq->title); ?>

                            </h4>
                        </div>
                        <div id="id<?php echo e($faq->id); ?>" class="panel-collapse collapse <?php if($loop->first): ?> show <?php endif; ?>" aria-labelledby="id<?php echo e($faq->id); ?>" data-parent="#accordion-1">
                            <div class="panel-body">
                            	<?php echo $faq->content; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
			</div>
		</div>
		</div>
	</section>
	<!-- Faq Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/faq.blade.php ENDPATH**/ ?>