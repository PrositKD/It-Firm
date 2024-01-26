

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
						<?php echo e(__('Checkout')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Checkout')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->


	<form class="needs-validation" action="javascript:;" id="payment_gateway_check" method="POST">
		<?php echo csrf_field(); ?>
		<!-- Checkout Area Start -->
		<section class="checkout-area">
		  <div class="container">
			<div class="row">
			  <div class="col-md-5 order-md-2 mb-4">
				<div class="cart-product">
				  <h4 class="d-flex justify-content-between align-items-center mb-3 g-title">
					<span><?php echo e(__('Your cart')); ?></span>
				  <?php
					  $countitem = 0;
					  $cartTotal = 0;
					  if($cart){
						  foreach($cart as $p){
							  $cartTotal += (double)$p['price'] * (int)$p['qty'];
							  $countitem += $p['qty'];
						  }
					  }
	  
				  ?>
					<span class="badge badge-success badge-pill cart-item-view"><?php echo e($countitem); ?></span>
				  </h4>
				  <div class="table-responsive">
					<table class="table table-bordered">
					  <thead>
						<tr>
						  <th width="45%"><?php echo e(__('Product Name')); ?></th>
						  <th width="25%" class="t-total"><?php echo e(__('Total')); ?></th>
						</tr>
					  </thead>
					  <tbody>
					  <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <tr>
						<td>
						  <?php
							  $product = App\Product::findOrFail($id);
						  ?>
						  <h4 class="product-title"><a href="<?php echo e(route('front.product.details',$product->slug)); ?>"><?php echo e($item['name']); ?></a></h4>
						</td>
						<td class="price"><?php echo e($item['price']); ?> * <?php echo e($item['qty']); ?>

						  = <?php echo e(Helper::showCurrencyPrice($item['price'] * $item['qty'])); ?></td>
					  </tr>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  </tbody>
					</table>
				  </div>
				  <?php
					  $shipping_methods = DB::table('shippings')->where('language_id',$currentLang->id)->where('status',1)->get();
				  ?>
				  <?php if(count($shipping_methods)>0): ?>
				  <div class="add-shiping-methods">
					<h4 class="g-title"><?php echo e(__('Shipping Methods')); ?></h4>
					<div class="table-responsive">
					  <table class="table table-bordered">
						<thead class="cart-header">
						  <tr>
							<th class="custom-space">#</th>
							<th><?php echo e(__('Method')); ?></th>
						  </tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
							  <td>
								<input type="radio" <?php if($loop->first ): ?> checked="" <?php endif; ?> name="shipping_charge" data="<?php echo e(Helper::showPrice($method->cost)); ?>" class="shipping-charge"
								  value="<?php echo e(Helper::showPrice($method->cost)); ?>">
							  </td>
							  <td>
								<p><strong><?php echo e($method->title); ?> (<span><?php echo e(Helper::showCurrencyPrice($method->cost)); ?></span>)</strong></p>
								<p><small><?php echo e($method->subtitle); ?></small></p>
							  </td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					  </table>
					</div>
				  </div>
				  <?php endif; ?>
				  <div class="cart-summery">
					<h4 class="title g-title">
					  <?php echo e(__('Cart Summery')); ?> :
					</h4>
					<table class="table table-bordered">
					  <tr>
						<th width="33.3%"><?php echo e(__('Subtotal')); ?></th>
						<td><?php echo e(Helper::showCurrencyPrice($cartTotal)); ?> </td>
					  </tr>
					  <?php if($shipping_methods->count() > 0): ?>
					  <?php
						  $shipping_cost = Helper::showPrice(json_decode($shipping_methods,true)[0]['cost']);
					  ?>
					  <tr>
						  <th width="33.3%"><?php echo e(__('Shiping Cost')); ?></th>
						  <td>+ <span><?php echo e(Helper::showCurrency()); ?></span><span class="shipping_cost"><?php echo e($shipping_cost); ?></span> </td>
						</tr>
					  <?php endif; ?>
					  <tr>
						<th width="33.3%"><?php echo e(__('Total')); ?></th>
						<td><span><?php echo e(Helper::showCurrency()); ?></span><span class="grand_total" data="<?php echo e($cartTotal); ?>" ><?php echo e($cartTotal + $shipping_cost); ?></span> </td>
					  </tr>
					</table>
				  </div>
				</div>
	  
	  
			  </div>
			  <div class="col-md-7 order-md-1">
				
				  <div class="billing-area">
					<h4 class="mb-3 g-title"><?php echo e(__('Billing Address')); ?></h4>
					  <?php
						  $user = Auth::user();
					  ?>
					<div class="mb-3">
					  <label for="name"><?php echo e(__('Name')); ?></label>
					  <input type="text" class="form-control" id="name" name="billing_name" value="<?php echo e($user->name); ?>">
					  <?php if($errors->has('billing_name')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_name')); ?> </p>
					  <?php endif; ?>
					</div>
					<div class="mb-3">
					  <label for="address"><?php echo e(__('Address')); ?></label>
					  <input type="text" class="form-control" name="billing_address" value="<?php echo e($user->address); ?>" id="address">
					  <?php if($errors->has('billing_address')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_address')); ?> </p>
					  <?php endif; ?>
					</div>
	  
					<div class="row">
					  <div class="col-md-6 mb-3">
						<label for="email"><?php echo e(__('Email')); ?></label>
						<input type="email" class="form-control" name="billing_email" value="<?php echo e($user->email); ?>" id="email" >
						<?php if($errors->has('billing_email')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_email')); ?> </p>
						<?php endif; ?>
					  </div>
					  <div class="col-md-6 mb-3">
						<label for="number"><?php echo e(__('Phone Number')); ?></label>
						<input type="text" class="form-control" id="number" value="<?php echo e($user->phone); ?>" name="billing_number"  >
						<?php if($errors->has('billing_number')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_number')); ?> </p>
						<?php endif; ?>
					  </div>
					</div>
	  
					<div class="row">
					  <div class="col-md-5 mb-3">
						<label for="country"><?php echo e(__('Country')); ?></label>
						<input type="text" class="form-control" name="billing_country" value="<?php echo e($user->country); ?>" id="country">
						<?php if($errors->has('billing_country')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_country')); ?> </p>
						<?php endif; ?>
					  </div>
					  <div class="col-md-4 mb-3">
						<label for="state"><?php echo e(__('City')); ?></label>
						<input type="text" class="form-control" name="billing_city" value="<?php echo e($user->city); ?>" id="city" >
						<?php if($errors->has('billing_city')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_city')); ?> </p>
						<?php endif; ?>
					  </div>
					  <div class="col-md-3 mb-3">
						<label for="zip-code"><?php echo e(__('Zip Code')); ?></label>
						<input type="text" class="form-control" name="billing_zip" value="<?php echo e($user->zipcode); ?>" id="zip-code" >
						<?php if($errors->has('billing_zip')): ?>
						<p class="text-danger"> <?php echo e($errors->first('billing_zip')); ?> </p>
						<?php endif; ?>
					  </div>
					</div>
				  </div>
	  
				  <div class="ship-diff-toogle">
					<div class="custom-control custom-switch">
					  <input type="checkbox" class="custom-control-input" name="is_ship" id="change_address"<?php echo e(old('is_ship') == 'on' ? 'checked' : ''); ?>>
					  <label class="custom-control-label" for="change_address"><?php echo e(__('Ship to a different location?')); ?></label>
					</div>
				  </div>
	  
				  <div class="shipping-area mb-4 <?php echo e(old('is_ship') == 'on' ? '' : 'd-none'); ?>" id="shipping-area">
					<h4 class="mb-3 g-title"><?php echo e(__('shipping Address')); ?></h4>
						 <div class="mb-3">
					  <label for="name"><?php echo e(__('Name')); ?></label>
					  <input type="text" class="form-control" id="name" name="shipping_name">
					  <?php if($errors->has('shipping_name')): ?>
					  <p class="text-danger"> <?php echo e($errors->first('shipping_name')); ?> </p>
					  <?php endif; ?>
					</div>
					<div class="mb-3">
					  <label for="address"><?php echo e(__('Address')); ?></label>
					  <input type="text" class="form-control" name="shipping_address" id="address" >
					  <?php if($errors->has('shipping_address')): ?>
					  <p class="text-danger"> <?php echo e($errors->first('shipping_address')); ?> </p>
					  <?php endif; ?>
					</div>
	  
					<div class="row">
					  <div class="col-md-6 mb-3">
						<label for="email"><?php echo e(__('Email')); ?></label>
						<input type="email" class="form-control" name="shipping_email" id="email"  >
						<?php if($errors->has('shipping_email')): ?>
						<p class="text-danger"> <?php echo e($errors->first('shipping_email')); ?> </p>
						<?php endif; ?>
					  </div>
					  <div class="col-md-6 mb-3">
						<label for="number"><?php echo e(__('Phone Number')); ?></label>
						<input type="text" class="form-control" id="number" name="shipping_number" >
						<?php if($errors->has('shipping_number')): ?>
						<p class="text-danger"> <?php echo e($errors->first('shipping_number')); ?> </p>
						<?php endif; ?>
					  </div>
					</div>
	  
					<div class="row">
					  <div class="col-md-5 mb-3">
						<label for="country"><?php echo e(__('Country')); ?></label>
						<input type="text" class="form-control" name="shipping_country" id="country" >
						<?php if($errors->has('shipping_country')): ?>
						<p class="text-danger"> <?php echo e($errors->first('shipping_country')); ?> </p>
						<?php endif; ?>
					  </div>
					  <div class="col-md-4 mb-3">
						<label for="state"><?php echo e(__('City')); ?></label>
						<input type="text" class="form-control" name="shipping_city" id="state" placeholder="<?php echo e(__('City')); ?>" >
						<?php if($errors->has('shipping_city')): ?>
						<p class="text-danger"> <?php echo e($errors->first('shipping_city')); ?> </p> 
						<?php endif; ?>
					  </div>
					  <div class="col-md-3 mb-3">
						<label for="zip-code"><?php echo e(__('Zip Code')); ?></label>
						<input type="text" class="form-control" name="shipping_zip" id="zip-code" >
						<?php if($errors->has('shipping_zip')): ?>
						<p class="text-danger"> <?php echo e($errors->first('shipping_zip')); ?> </p>
						<?php endif; ?>
					  </div>
					</div>
				  </div>
				  
				  <div class="patment-area">
					<h4 class="mb-3 g-title"> <?php echo e(__('Select Payment Gateway')); ?> </h4>
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
					<div class="payment_show_check d-none">
						<div class="gd-payment-form-wrapper">
							<div class="payment-form-wrapper-inner">
								<div class="card willFlip" id="willFlip">
									<div class="front">
											<div class="d-flex justify-content-between">
												<img src="<?php echo e(asset('assets/front/img')); ?>/card/card_bank.png" width="50" style="filter: contrast(0)" height="50" alt="">
												<img src="<?php echo e(asset('assets/front/img')); ?>/card/visa.png" width="50" height="50" alt="">
											</div>
											<div class="mt-1">
												<div class="form-group">
													<label for="cardNumber"></label>
													<input type="text" class="form-control animate__animated animate__bounce animate__duration-2s" disabled readonly id="cardNumber">
												</div>
											</div>
											<div class="front-bottom">
												<div class="card-holder-content">
													<div class="form-group">
														<label for="cardHolderValue"><?php echo e(__('Card Holder')); ?></label>
														<input type="text" placeholder="FULL NAME" disabled class="cardHolder form-control animate__animated animate__bounce animate__duration-2s" id="cardHolderValue">
													</div>
												</div>
												<div class="card-expires-content">
													<div class="input-date">
														<label for="expiredMonth" class="text-right d-block"><?php echo e(__('Expires')); ?></label>
														<div class="row content-date-input justify-content-end animate__animated animate__duration-2s animate__bounce">
															<input type="text" disabled class="cardHolder col-4 form-control" id="expiredMonth">
															<h4 class="mt-1 p-2 slash-text"> / </h4>
															<input type="text" disabled class="cardHolder col-4 form-control" id="expiredYear">
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="back">
										<div class="card-bar"></div>
										<div class="col-md-12  back-middle">
											<div class="form-group">
												<label for="cardCcv" class="text-right d-block"><?php echo e(__('CVC')); ?></label>
												<input type="password" disabled class="form-control" id="cardCcv">
											</div>
											<img src="<?php echo e(asset('assets/front/img')); ?>/card/visa.png" class="float-right" width="50" height="50" alt="">
										</div>
									</div>
								</div>
								<div class="paymentmainform" id="paymentmainform">
									<div class="form-group">
										<label for="cardInput"><?php echo e(__('Card Number')); ?></label>
										<input class="input card-input_field form-control" name="card_number" id="cardInput">
									</div>
									<div class="form-group">
										<label for="cardHolder"><?php echo e(__('Card Holder')); ?></label>
										<input class="card-input_field form-control" name="fullname" id="cardHolder">
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="monthInput"><?php echo e(__('Expiration Date')); ?></label>
												<select name="month" class="form-control card-input_field" id="monthInput">
													<option class="disabled" readonly><?php echo e(__('Month')); ?></option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="yearInput"></label>
												<select name="year" class="form-control card-input_field mt-2" id="yearInput">
													<option class="disabled" readonly><?php echo e(__('Year')); ?></option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="cwInput"><?php echo e(__('CVC')); ?></label>
												<input type="text" name="cvc" class="form-control card-input_field" id="cwInput">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				  </div>
	  
					<hr class="mb-4">
					<button class="mybtn1" type="submit"><?php echo e(__('Place Order')); ?></button>
				  </div>
			   
			  </div>
			</div>
		  </div>
		</section>
	</form>
	<input type="hidden" id="product_paypal" value="<?php echo e(route('product.paypal.submit')); ?>">
	<input type="hidden" id="product_stripe" value="<?php echo e(route('product.stripe.submit')); ?>">



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/checkout.blade.php ENDPATH**/ ?>