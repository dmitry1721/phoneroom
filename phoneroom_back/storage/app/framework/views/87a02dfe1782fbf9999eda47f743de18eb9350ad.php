

<?php $__env->startSection('content'); ?>
    <div>
        <h2 class="pt-2 mb-3">Пользователи:</h2>
        <?php if(Auth::user()->position->name === 'admin'): ?>
            <div class="row w-100 pt-2 justify-content-between">
                <div class="col-3 ">
                    <a class="btn d-inline-block btn-dark" href="<?php echo e(route('admin.users.create')); ?>">Добавить модератора</a>
                </div>



            </div>
        <?php endif; ?>
        <hr>
        <div class="row mt-3">
            <table class="table table-hover table-striped table-ligth">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Email</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Город</th>
                    <th scope="col">Улица</th>
                    <th scope="col">Дом/Квартира</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Дата изменения</th>
                </tr>
                </thead>
                <tbody>
                <span class="d-none">
                    <?php echo e($count = 0); ?>

                </span>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($u->id); ?></th>
                        <th scope="col"><?php echo e($u->first_name); ?></th>
                        <th scope="col"><?php echo e($u->position->name); ?></th>
                        <th scope="col"><?php echo e($u->email); ?></th>
                        <th scope="col"><?php echo e($u->phone); ?></th>
                        <th scope="col"><?php echo e($u->profile->address->city ?? 'Не задан'); ?></th>
                        <th scope="col"><?php echo e($u->profile->address->street ?? 'Не задана'); ?></th>
                        <th scope="col"><?php echo e($u->profile->address->house ?? 'Не задан'); ?></th>
                        <th scope="col"><?php echo e($u->created_at); ?></th>
                        <th scope="col"><?php echo e($u->updated_at ?? 'Изменений нет'); ?></th>

                        <span class="d-none">
                            <?php if($u->position->name === 'moder'): ?>
                                <?php echo e($count+=1); ?>

                            <?php endif; ?>
                        </span>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p>
                    <b>Всего модераторов назначено - <?php echo e($count); ?></b>
                </p>
                </tbody>
            </table>

            <div class="row pt-5 pb-2">
                <?php echo e($users->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\phoneroom_back\resources\views/admin/user/index.blade.php ENDPATH**/ ?>