

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
					<?php echo e(__('Buy Package')); ?>

				</h1>
				<ul class="pages">
					<li>
						<a href="<?php echo e(route('front.index')); ?>">
							<?php echo e(__('Home')); ?>

						</a>
					</li>
					<li class="active">
						<a href="#">
							<?php echo e(__('Buy Package')); ?>

						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Main Breadcrumb Area End -->

<!-- Package Checkout Area Start -->
<form class="needs-validation" action="javascript:;" id="plan_order_submit" method="POST">
	<?php echo csrf_field(); ?>
<section class="pricingPlan-section packag-page orderpage">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h4 class="mb-4">
					<strong>
						<?php if($already_purchased): ?>
							<?php echo e(__('You already purchased a package, now update your package :')); ?>

						<?php else: ?>
							<?php echo e(__('Buy this package :')); ?>

						<?php endif; ?>
					</strong>
				</h4>
				<table class="table border table-striped">
					<tbody>
						<tr>
							<th scope="row"><?php echo e(__('Name')); ?></th>
							<td><?php echo e(Auth::user()->name); ?></td>
						</tr>
						<tr>
							<th scope="row"><?php echo e(__('Email')); ?></th>
							<td><?php echo e(Auth::user()->email); ?></td>
						</tr>
						<tr>
							<th scope="row"><?php echo e(__('Phone')); ?></th>
							<td><?php echo e(Auth::user()->phone); ?></td>
						</tr>
						<tr>
							<th scope="row"><?php echo e(__('Address')); ?></th>
							<td><?php echo e(Auth::user()->address); ?></td>
						</tr>
					</tbody>
				</table>
				<div class="patment-area">
					<h4 class="mb-3 g-title"> <?php echo e(__('Select Payment Gateway :')); ?> </h4>
					<div class="d-block my-3">
						<div class="payment-gateway">
							<ul class="select-payment">
								<?php $__currentLoopData = DB::table('payment_gateweys')->where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="plan_payment_gateway_check" data-href="<?php echo e($gateway->id); ?>" id="<?php echo e($gateway->type == 'automatic' ? $gateway->name : $gateway->title); ?>">
								  <p class="mybtn2"><?php echo e($gateway->name); ?></p>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  </ul>
							<?php if($errors->has('gateway')): ?>
								<p class="text-danger"> <?php echo e($errors->first('gateway')); ?> </p>
							<?php endif; ?>
						</div>
					</div>
					<input type="hidden" value="" id="payment_gateway" name="payment_gateway" value="payment_gateway">
					<input type="hidden" name="packageid"  value="<?php echo e($packagedetails->id); ?>">
					<hr class="mb-4">
					<button type="submit" class="mybtn1 submitbtn"><?php echo e(__('Submit')); ?></button>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-price">
					<h4 class="name">
						<?php echo e($packagedetails->name); ?>

					</h4>
					<div class="mbps">
						<?php echo e($packagedetails->speed); ?> <span><?php echo e(__('Mbps')); ?></span>
					</div>


					<div class="list">
						<?php
						$feature = explode( ',', $packagedetails->feature );
						for ($i=0; $i < count($feature); $i++) { 
							echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
						}
					?>
					</div>
					<div class="bottom-area">
						<div class="price-area">
							<div class="price-top-area">
								<?php if($packagedetails->discount_price == null): ?>
									<p class="price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($packagedetails->price); ?></p>
								<?php else: ?>
									<p class="discount_price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($packagedetails->discount_price); ?></p>
									<p class="price discounted"><del><?php echo e(Helper::showCurrency()); ?><?php echo e($packagedetails->price); ?></del></p>
								<?php endif; ?>
							</div>
							<p class="time">
								<?php echo e($packagedetails->time); ?>

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</form>


<input type="hidden" id="plan_paypal" value="<?php echo e(route('package.paypal.submit')); ?>">
<input type="hidden" id="plan_stripe" value="<?php echo e(route('package.stripe.submit')); ?>">
<!-- Package Checkout Area End-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/packagecheckout.blade.php ENDPATH**/ ?>