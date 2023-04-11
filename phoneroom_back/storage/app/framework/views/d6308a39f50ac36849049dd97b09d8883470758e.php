

<?php $__env->startSection('content'); ?>
    <div>
        <h1 class="pt-2 mb-3">Мой профиль</h1>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="http://www.freeiconspng.com/uploads/profile-icon-9.png" alt=""
                                 class="img-rounded w-100 img-responsive"/>
                        </div>
                        <div class="col-sm-7 col-md-7 pt-5">
                            <h4>
                                <?php echo e($user->first_name); ?> <?php echo e($user->profile->middle_name); ?> <?php echo e($user->profile->last_name); ?>

                            </h4>
                            <small class="pb-2">
                                <cite>
                                    <?php if($user->position->name === 'admin'): ?>
                                        Администратор

                                    <?php else: ?>
                                        Модератор
                                    <?php endif; ?>
                                </cite>
                            </small>
                            <p>
                                <i class="fa-regular fa glyphicon fa-envelope"></i><?php echo e($user->email); ?>

                                <br/>
                                <i class="fa-solid fa glyphicon fa-phone"></i><?php echo e($user->phone); ?>

                                <br/>
                                <i class="fa-solid fa glyphicon fa-address-book"></i><?php echo e(($profile->address->fullAddress ?? "")); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 mb-3" style="border-left: 1px solid rgba(0, 0, 0, 0.1);">
                <form class="pl-3" action="<?php echo e(route('admin.profiles.update', [$profile->slug, $user->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Имя</label>
                        <input value="<?php echo e($user->first_name); ?>" placeholder="<?php echo e($user->first_name); ?>" name="first_name" type="text"
                               class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="first_name"
                               autocomplete="first_name" autofocus>

                        <?php $__errorArgs = ["first_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Отчество</label>
                        <input value="<?php echo e(old('middle_name')); ?>" placeholder="<?php echo e($profile->middle_name); ?>" name="middle_name" type="text"
                               class="form-control <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="middle_name"
                               autocomplete="middle_name" autofocus>

                        <?php $__errorArgs = ["middle_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Фамилия</label>
                        <input value="<?php echo e(old('last_name')); ?>" placeholder="<?php echo e($profile->last_name); ?>" name="last_name" type="text"
                               class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="last_name"
                               autocomplete="last_name" autofocus>

                        <?php $__errorArgs = ["last_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?php echo e(old('email')); ?>" placeholder="<?php echo e($user->email); ?>" name="email" type="email"
                               class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                               autocomplete="email" autofocus>

                        <?php $__errorArgs = ["email"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Номер телефона</label>











                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+7</span>
                            </div>
                            <input value="<?php echo e($user->phone); ?>" placeholder="<?php echo e($user->phone); ?>" name="phone" type="tel"
                                   class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" required
                                   autocomplete="phone" autofocus
                                   data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">

                            <?php $__errorArgs = ["phone"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fullAddress" class="form-label">Адрес</label>
                        <input value="<?php echo e(old('fullAddress')); ?>" placeholder="<?php echo e(($profile->address->fullAddress ?? "")); ?>" name="fullAddress" type="text"
                               class="form-control <?php $__errorArgs = ['fullAddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fullAddress"
                               autocomplete="fullAddress" autofocus>

                        <?php $__errorArgs = ["fullAddress"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>










                    <button type="submit" class="mb-3 mt-3 btn btn-info">Изменить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\phoneroom_back\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>