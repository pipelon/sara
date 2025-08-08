<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \Yii::$app->homeUrl; ?>" class="brand-link bg-red">
        <?=
        \yii\helpers\Html::img("@web/images/logoRojo.jpg",
                [
                    'alt' => 'Equinetics Logo',
                    'class' => 'brand-image img-circle elevation-3',
                    'style' => 'opacity: .8'
        ])
        ?>
        <span class="brand-text font-weight-light">S.A.R.A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->fullName; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            $callback = function ($menu) {
                if (count($menu['children']) > 0) {
                    return [
                        'label' => $menu['name'],
                        'url' => [$menu['route']],
                        'icon' => $menu['data'],
                        'items' => $menu['children']
                    ];
                } else {
                    return [
                        'label' => $menu['name'],
                        'icon' => $menu['data'],
                        'url' => [$menu['route']],
                    ];
                }
            };
            $items = mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);


            $items[] = [
                'label' => 'Salir (' . \Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'icon' => 'fas fa-sign-out-alt',
                'template' => '<a class="nav-link" href="{url}" data-method="post">{icon} {label}</a>'
            ];
            echo \hail812\adminlte\widgets\Menu::widget(['items' => $items]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>