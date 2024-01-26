

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
						<?php echo e(__('Cart')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Cart')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->
  <!-- Cart Area Start -->
  <section class="cart-area remove_before">
    <?php if($cart !=null): ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cart-table">
            <div class="table-responsive table-remove">
              <table class="table table-bordered cart-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo e(__('Image')); ?></th>
                    <th><?php echo e(__('Product Name')); ?></th>
                    <th class="t-qty"><?php echo e(__('Quantity')); ?></th>
                    <th class="t-price"><?php echo e(__('Price')); ?></th>
                    <th class="t-price"><?php echo e(__('Total')); ?></th>
                    <th class="t-price"><?php echo e(__('Action')); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        $cartTotal = 0;
                        $countitem = 0;
                    ?>
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $countitem += $item['qty'];
                        $cartTotal += (double)$item['price'] * (int)$item['qty'];
                        $product = App\Product::findOrFail($pid);
                    ?>
                    <input type="hidden" value="<?php echo e($pid); ?>" class="product_id">
                    <tr class="remove<?php echo e($pid); ?>">
                        <td><?php echo e($i++); ?></td>
                        <td>
                          <div class="thumbnail">
                            <img src="<?php echo e(asset('assets/front/img/'.$item['photo'])); ?>" alt="product-image">
                          </div>
                        </td>
                        <td>
                          <h4 class="product-title"><a href="#"><?php echo e($item['name']); ?></a></h4>
                        </td>
                        <td>
                            <input type="number" aria-details="<?php echo e($product->stock); ?>" name="product_quantity[]" class="quantity form-control cart_qty_update" value="<?php echo e($item['qty']); ?>">
                        </td>
                        <td><?php echo e(Helper::showCurrency()); ?><?php echo e($item['price']); ?> <span class="fas fa-times"></span> <?php echo e($item['qty']); ?></td>
                        <td> <?php echo e(Helper::showCurrency()); ?><span class="cart_price"><?php echo e($item['price'] * $item['qty']); ?></td></span>
                        <td>
                          <button class="btn btn-danger btn-sm item-remove" rel="<?php echo e($pid); ?>" data-href="<?php echo e(route('cart.item.remove',$pid)); ?>"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot class="cart-middle">
                  <tr>
                    <td colspan="6">
                      <div class="cart-footer-area">
                        <div class="row">
                          <div class="col-md-6 offset-6">
                            <div class="update-cart">
                              <button id="cart_update"  data-href="<?php echo e(route('cart.update')); ?>" class="mybtn1"><?php echo e(__('Update Cart')); ?></button>
                            </div>
                          </div>
                        </div>
                        </div>
                    </td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

        </div>
      </div>
      <div class="row justify-content-end cart-middle">
        <div class="col-md-6">
          <div class="cart-summery">
            <h4 class="title">
              <?php echo e(__('Cart Summery :')); ?>

            </h4>
            <table class="table table-bordered">
              <tr>
                <th><?php echo e(__('Total Item')); ?></th>
                <td class="cart-item-view"> <?php echo e($countitem); ?></td>
              </tr>
              <tr>
                <th><?php echo e(__('Total')); ?></th>
                <td> <span><?php echo e(Helper::showCurrency()); ?></span><span class="cart-total-view"><?php echo e($cartTotal); ?></span> </td>
              </tr>
            </table>
            <div class="checkout-btn-wrape">
              <a href="<?php echo e(route('front.checkout')); ?>" class="mybtn1"> <?php echo e(__('Checkout')); ?> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php else: ?>
    <div class="container" id="nocart">
      <div class="row">
        <div class="col-lg-12">
           <div class="bg-light py-5 text-center">
              <h3 class="text-uppercase"><?php echo e(__('Cart is empty!')); ?></h3>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </section>
  <!-- Cart Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/front/cart.blade.php ENDPATH**/ ?>