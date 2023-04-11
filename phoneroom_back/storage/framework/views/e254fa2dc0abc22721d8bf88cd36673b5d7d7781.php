<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.products.index')); ?>" class="<?php echo e(Request::is('*/products*') ? 'active' : ''); ?> nav-link">
                <i class="nav-icon fa fa-solid fa-store"></i>
                <p>
                    Товары
                </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-duotone fa-money-bill"></i>
                <p>
                    Заказы
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.tags.index')); ?>" class="<?php echo e(Request::is('*/tags*') ? 'active' : ''); ?> nav-link">
                <i class="nav-icon fa fa-solid fa-hashtag"></i>
                <p>
                    Теги
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="<?php echo e(Request::is('*/categories*') ? 'active' : ''); ?> nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                    Категории
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.brands.index')); ?>" class="<?php echo e(Request::is('*/brands*') ? 'active' : ''); ?> nav-link">
                <i class="nav-icon fa fa-solid fa-copyright"></i>
                <p>
                    Бренды
                </p>
            </a>
        </li>
    </ul>
</nav><?php /**PATH D:\projects\phoneroom_back\resources\views/includes/admin/sidebar.blade.php ENDPATH**/ ?>