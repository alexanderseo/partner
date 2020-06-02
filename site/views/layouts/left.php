<?php

use app\rbac\Roles;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <?php if (false): ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php endif ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Профиль',
                        'icon' => 'user',
                        'url' => ['/'],
                        'active' => $this->context->route === 'site/index'
                    ],
                    [
                        'label' => 'Отчет по регистрациям',
                        'icon' => 'list',
                        'url' => ['/site/report1'],
                        'active' => $this->context->route === 'site/report1'
                    ],
                    [
                        'label' => 'Отчет по покупкам',
                        'icon' => 'list',
                        'url' => ['/site/report2'],
                        'active' => $this->context->route === 'site/report2'
                    ],
                    Roles::isAdmin() ? [
                        'label' => 'Партнеры',
                        'icon' => 'users',
                        'url' => ['/site/partners'],
                        'active' => $this->context->route === 'site/partners'
                    ] : false,
                    false && ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    false && ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    false && ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    false && [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'activeCssClass'=>'active',
            ]
        ) ?>

    </section>

</aside>
