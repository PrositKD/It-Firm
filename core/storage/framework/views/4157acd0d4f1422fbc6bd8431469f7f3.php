

<?php $__env->startSection('content'); ?>



    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e(__('Product')); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><?php echo e(__('Product')); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Edit Product')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(route('admin.product'). '?language=' . $currentLang->code); ?>"
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" action="<?php echo e(route('admin.product.update', $product->id)); ?>"
                                  method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <select class="form-control lang" name="language_id">
                                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lang->id); ?>" <?php echo e($product->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('language_id')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label"><?php echo e(__('Image')); ?><span
                                                class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                             src="<?php echo e(asset('assets/front/img/'.$product->image)); ?>" alt="">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                   for="image"><?php echo e(__('Choose Image')); ?></label>
                                            <input type="file" class="custom-file-input up-img" name="image" id="image">
                                        </div>
                                        <?php if($errors->has('image')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('image')); ?> </p>
                                        <?php endif; ?>
                                        <p class="help-block text-info"><?php echo e(__('Upload 730X455 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.')); ?>

                                        </p>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 control-label"><?php echo e(__('Title')); ?><span
                                                class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($product->title); ?>">
                                        <?php if($errors->has('title')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('title')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="current_price" class="col-sm-2 control-label"><?php echo e(__('Current Price')); ?>

                                        (<?php echo e(Helper::showCurrency()); ?>)<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="current_price"
                                               placeholder="<?php echo e(__('Current Price')); ?>"
                                               value="<?php echo e($product->current_price); ?>">
                                        <?php if($errors->has('current_price')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('current_price')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="previous_price"
                                           class="col-sm-2 control-label"><?php echo e(__('Previous Price')); ?>

                                        (<?php echo e(Helper::showCurrency()); ?>)<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="previous_price"
                                               placeholder="<?php echo e(__('Previous Price')); ?>"
                                               value="<?php echo e($product->previous_price); ?>">
                                        <?php if($errors->has('previous_price')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('previous_price')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="stock" class="col-sm-2 control-label"><?php echo e(__('Product Stock Quantity')); ?>

                                        <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="stock"
                                               placeholder="<?php echo e(__('Product Stock Quantity')); ?>"
                                               value="<?php echo e($product->stock); ?>">
                                        <?php if($errors->has('stock')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('stock')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description"
                                           class="col-sm-2 control-label"><?php echo e(__('Short Description')); ?></label>

                                    <div class="col-sm-10">
                                        <textarea name="short_description" rows="4" class="form-control summernote"
                                                  id="ck"
                                                  placeholder="<?php echo e(__('Short Description')); ?>"><?php echo e($product->short_description); ?></textarea>
                                        <?php if($errors->has('description')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('short_description')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description"
                                           class="col-sm-2 control-label"><?php echo e(__('Description')); ?></label>

                                    <div class="col-sm-10">
                                        <textarea name="description" rows="4" class="form-control summernote" id="ck"
                                                  placeholder="<?php echo e(__('Description')); ?>"><?php echo e($product->description); ?></textarea>
                                        <?php if($errors->has('description')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('description')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="meta_tags" class="col-sm-2 control-label"><?php echo e(__('Meta Tags')); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" data-role="tagsinput" name="meta_tags"
                                               placeholder="<?php echo e(__('Meta Tags')); ?>" value="<?php echo e($product->meta_tags); ?>">
                                        <?php if($errors->has('meta_tags')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('meta_tags')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="meta_description"
                                           class="col-sm-2 control-label"><?php echo e(__('Meta Description')); ?></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="meta_description"
                                                  placeholder="<?php echo e(__('Meta Description')); ?>"
                                                  rows="4"><?php echo e($product->meta_description); ?></textarea>
                                        <?php if($errors->has('meta_description')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('meta_description')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 control-label"><?php echo e(__('Status')); ?><span
                                                class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            <option value="0" <?php echo e($product->status == '0' ? 'selected' : ''); ?>><?php echo e(__('Unpublish')); ?></option>
                                            <option value="1" <?php echo e($product->status == '1' ? 'selected' : ''); ?>><?php echo e(__('Publish')); ?></option>
                                        </select>
                                        <?php if($errors->has('status')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('status')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skynet\core\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>