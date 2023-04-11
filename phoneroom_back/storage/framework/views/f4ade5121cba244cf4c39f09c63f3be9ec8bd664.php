<?php $__env->startSection('content'); ?>
    <h1 class="pt-2 mb-3"><?php echo e($variant['product_name'] ?? $product->name); ?></h1>
    <hr>
    <div class="card card-solid">
        <div class="card-body mt-2">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class="col-12">
                        <img  src="<?php echo e(asset($variant['image'] ?? asset($product->image))); ?>" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs justify-content-center">
                        <div class="product-image-thumb" style="cursor: pointer;"><img  src="<?php echo e(asset($variant['image'] ?? asset($product->image))); ?>" alt="Product Image"></div>
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($variant): ?>
                            <?php if($img->variant_id === (int)$variant['id'] && $img->path !== ''): ?>
                                <div class="product-image-thumb" style="cursor: pointer;"><img src="<?php echo e(asset($img->path)); ?>" alt="Product Image"></div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="product-image-thumb" style="cursor: pointer;"><img src="<?php echo e(asset($img->path)); ?>" alt="Product Image"></div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <img  src="<?php echo e(asset($product->brand->image)); ?>" width="214" height="74" class="brand-image" alt="Brand Image">
                    <h4 class="mt-2">Рейтинг: <?php echo e($product->rating); ?></h4>
                    <hr>
                    <h4>Теги:</h4>
                    <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="btn-group mt-2 col btn-group-toggle" data-toggle="buttons">
                            <label class="text-center">
                                <?php if($pt->image): ?>
                                    <img  src="<?php echo e(asset($pt->image)); ?>" class="brand-image pr-1" alt="Tag Image">
                                <?php endif; ?>
                                <?php echo e($pt->name); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($product->option) && empty($variant) !== true): ?>
                        <?php $__currentLoopData = json_decode($product->option->options_json, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_array($val)): ?>
                                    <h4 class="mt-4"><?php echo e($val); ?>:</h4>
                                <?php else: ?>
                                    <?php if(isset($option[$key]['colors'])): ?>
                                        <?php for($i=0; $i<count($option[$key])-1; $i++): ?>
                                            <div class="btn-group mt-2 btn-group-toggle" data-toggle="buttons">
                                                <?php if(!is_array($option[$key][$i])): ?>
                                                    <?php if(str_contains($variant['name'], $option[$key][$i])): ?>
                                                        <label class="btn btn-default text-center border-dark">
                                                            <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                                                            <?php echo e($option[$key][$i]); ?>

                                                            <br>
                                                            <i class="fas fa-circle fa-2x" style="color:<?php echo e($option[$key]['colors'][$i]); ?>;"></i>
                                                        </label>
                                                    <?php else: ?>
                                                        <label class="btn btn-default text-center">
                                                            <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                                                            <?php echo e($option[$key][$i]); ?>

                                                            <br>
                                                            <i class="fas fa-circle fa-2x" style="color: <?php echo e($option[$key]['colors'][$i]); ?>;"></i>
                                                        </label>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endfor; ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(str_contains($variant['name'], $v)): ?>
                                                <div class="btn-group mt-2 btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-default text-center border-dark">
                                                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                                        <?php echo e($v); ?>

                                                    </label>
                                                </div>
                                            <?php else: ?>
                                                <div class="btn-group mt-2 btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-default text-center">
                                                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                                        <?php echo e($v); ?>

                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            <?php echo e($variant['price'] ?? $product->price); ?> ₽
                        </h2>
                        <?php if(isset($product->old_price) or isset($variant['old_price'])): ?>
                        <h4 class="mt-0">
                            <small style="text-decoration-line: line-through;"><?php echo e($variant['old_price'] ?? $product->old_price); ?> ₽</small>
                        </h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Описание</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Характеристики</a>

                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab" style="white-space: pre-line;">
                        <?php echo e($variant['description'] ?? $product->description); ?>

                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                        <ul>
                            <?php if(isset($product->property)): ?>
                                <?php $__currentLoopData = json_decode($product->property->properties_json); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!is_object($val)): ?>
                                        <li><strong><?php echo e($val); ?></strong></li>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($k); ?>: <?php echo e($v); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\phoneroom_back\resources\views/admin/product/show.blade.php ENDPATH**/ ?>