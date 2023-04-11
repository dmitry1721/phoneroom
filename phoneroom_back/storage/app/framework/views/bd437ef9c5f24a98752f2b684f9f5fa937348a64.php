

<?php $__env->startSection('content'); ?>

    <div>
        <h2 class="pt-2 mb-3">Категории:</h2>
        <div class="row w-100 pt-2 justify-content-between">
            <div class="col">
                <a class="btn d-inline-block btn-primary" href="<?php echo e(route('admin.categories.create')); ?>">Добавить категорию</a>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <table id="example2" class="table table-responsive-lg table-hover dataTable dtr-inline" aria-describedby="example2_info">
                <thead class="thead thead">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действия</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Дата изменения</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($category->id); ?></th>
                        <th><?php echo e($category->name); ?></th>
                        <th>
                            <a href="<?php echo e(route('admin.categories.show', $category->slug)); ?>"><i class="fa fa-solid fa-eye"></i></a>
                            <a class="pl-md-5 pr-md-5 pl-3 pr-3" href="<?php echo e(route('admin.categories.edit', $category->slug)); ?>"><i class="fa fa-solid fa-pen"></i></a>
                            <form class="m-0 p-0 d-inline-block" action="<?php echo e(route('admin.categories.destroy', $category->slug)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button class="btn btn-danger" type="submit"><i class="fa fa-solid fa-trash"></i></button>

                                
                            </form>
                        </th>
                        <th><?php echo e($category->created_at); ?></th>
                        <th><?php echo e($category->updated_at ?? 'Изменений нет'); ?></th>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Название</th>
                        <th rowspan="1" colspan="1">Действия</th>
                        <th rowspan="1" colspan="1">Дата создания</th>
                        <th rowspan="1" colspan="1">Дата изменения</th>
                    </tr>
                </tfoot>
            </table>

            <div class="row pt-5 pb-2">
                <?php echo e($categories->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\phoneroom_back\resources\views/admin/category/index.blade.php ENDPATH**/ ?>