

<?php $__env->startSection('content'); ?>
    <div>
        <h1 class="text-left">Товары:</h1>
        <div class="row w-100 pt-2 justify-content-between">
            <div class="col">
                <a class="btn d-inline-block btn-primary" href="<?php echo e(route('admin.products.create')); ?>">Добавить товар</a>
            </div>
        </div>
        <hr>

        <div class="row product-cart-index">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12" id="accordion<?php echo e($product->id); ?>">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse<?php echo e($product->slug); ?>" href="<?php echo e(route('admin.products.show', $product->slug)); ?>" aria-expanded="false">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">
                                    <?php echo e($key+1); ?>. <?php echo e($product->name); ?>

                                </h4>
                                <a class="d-inline-block pl-2" href="<?php echo e(route('admin.products.edit', $product->slug)); ?>"><i class="fa fa-solid fa-pen"></i></a>
                            </div>
                        </a>
                        <form class="d-inline-block" action="<?php echo e(route('admin.products.destroy', $product->slug)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="text-primary btn d-inline-block ml-2" type="submit"><i class="fa fa-solid fa-trash"></i></button>
                        </form>
                        <div id="<?php echo e($product->slug); ?>" class="collapse<?php echo e($product->slug); ?>" data-parent="#accordion<?php echo e($product->id); ?>" style="">
                            <div class="card-body">
                                <section class="card d-flex" style="overflow-x: auto;flex-direction: row;padding: 20px;">
                                    <?php if(count($product->variants)): ?>
                                        <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card--content mr-5">
                                                <div class="row" style="flex-direction: row-reverse;">
                                                    <div class="col">
                                                        <a class="d-inline-block " href="<?php echo e(route('admin.products.variant_edit', [$product->slug, json_decode($variant->variants_json, true)['slug']])); ?>"><i class="fa fa-solid fa-pen"></i></a>
                                                        <img src="<?php echo e(asset(json_decode($variant->variants_json, true)['image'])); ?>" alt="ProductVariant" width="200" height="200">
                                                    </div>
                                                    <div class="col">
                                                        <b><p class="name pt-2 d-inline-block"><?php echo e(json_decode($variant->variants_json, true)['product_name']); ?></p></b>
                                                        <p class="">Категория - <?php echo e($product->category->name); ?></p>
                                                        <p class="">Бренд - <?php echo e($product->brand->name); ?></p>
                                                        <p class="">Цена: <?php echo e(json_decode($variant->variants_json, true)['price']); ?> р.</p>
                                                        <b><a href="<?php echo e(route('admin.products.variant_show', [$product->slug, json_decode($variant->variants_json, true)['slug']])); ?>">Подробнее</a></b>
                                                        <form class="mt-5" action="<?php echo e(route('admin.products.variant_destroy', [$product->slug, json_decode($variant->variants_json, true)['slug']])); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <button class="btn btn-danger" type="submit">Удалить</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="card--content mr-5">
                                            <div class="row" style="flex-direction: row-reverse;">
                                                <div class="col">

                                                    <img src="<?php echo e(asset($product->image)); ?>" alt="ProductVariant" width="200" height="200">
                                                </div>
                                                <div class="col">
                                                    <b><p class="name pt-2 d-inline-block"><?php echo e($product->name); ?></p></b>
                                                    <p class="">Категория - <?php echo e($product->category->name); ?></p>
                                                    <p class="">Бренд - <?php echo e($product->brand->name); ?></p>
                                                    <p class="">Цена: <?php echo e($product->price); ?> р.</p>
                                                    <b><a href="<?php echo e(route('admin.products.show', $product->slug)); ?>">Подробнее</a></b>
                                                    <form class="mt-5" action="<?php echo e(route('admin.products.destroy', $product->slug)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <button class="btn btn-danger" type="submit">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row mt-3">
            <?php echo e($products->withQueryString()->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\phoneroom_back\resources\views/admin/product/index.blade.php ENDPATH**/ ?>