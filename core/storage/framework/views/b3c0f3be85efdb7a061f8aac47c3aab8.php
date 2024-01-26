

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
						<?php echo e(__('Pay Bill')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Pay Bill')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

	<!-- PayBill Area Start -->
	<form class="needs-validation" action="javascript:;" id="payment_gateway_check" method="POST">
		<?php echo csrf_field(); ?>
	<section class="pricingPlan-section packag-page">
		<div class="container">
			<div class="row">
				<?php if(Auth::user()->activepackage !== null): ?>
					<?php if($billpayed !== null): ?>
						<div class="col-lg-8">
							<h4 class="mb-4"><strong><?php echo e(__('This month bill is paid :')); ?></strong></h4>
							<table class="table border table-striped">
								<tbody>
									<tr>
										<th scope="row"><?php echo e(__('Username')); ?></th>
										<td><?php echo e(Auth::user()->username); ?></td>
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
										<th scope="row"><?php echo e(__('Current Date')); ?></th>
										<td><?php echo e(\Carbon\Carbon::now()->format('M d, Y')); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-4">
							<h4 class="mb-4"><strong><?php echo e(__('Active Package :')); ?></strong></h4>
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
					<?php else: ?>
						<div class="col-lg-8">
							<h4 class="mb-4"><strong><?php echo e(__('Pay bill for this month :')); ?></strong></h4>
							<table class="table border table-striped">
								<tbody>
									<tr>
										<th scope="row"><?php echo e(__('Username')); ?></th>
										<td><?php echo e(Auth::user()->username); ?></td>
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
										<th scope="row"><?php echo e(__('Current Date')); ?></th>
										<td><?php echo e(\Carbon\Carbon::now()->format('M d, Y')); ?></td>
									</tr>
								</tbody>
							</table>

							<div class="patment-area">
								<h4 class="mb-3 g-title"> <?php echo e(__('Select Payment Gateway :')); ?> </h4>
								<div class="d-block my-3">
									<div class="payment-gateway">
										<ul class="select-payment">
											<?php $__currentLoopData = DB::table('payment_gateweys')->where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li class="product_payment_gateway_check" data-href="<?php echo e($gateway->id); ?>" id="<?php echo e($gateway->type == 'automatic' ? $gateway->name : $gateway->title); ?>">
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
								<hr class="mb-4">
								<button type="submit" class="mybtn1 submitbtn"><?php echo e(__('Submit')); ?></button>
							</div>
						</div>
						<div class="col-lg-4">
							<h4 class="mb-4"><strong><?php echo e(__('Active Package :')); ?></strong></h4>
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
					<?php endif; ?>
				<?php else: ?>
					<div class="col-lg-12 text-center">
						<h3><?php echo e(__("You don't purchase any package. First buy a package.")); ?></h3>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</form>
<input type="hidden" id="product_paypal" value="<?php echo e(route('paybill.paypal.submit')); ?>">
<input type="hidden" id="product_stripe" value="<?php echo e(route('paybill.stripe.submit')); ?>">
	<!-- PayBill Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/billpay.blade.php ENDPATH**/ ?>