<aside class="main-sidebar">

    <section class="sidebar">


    <?= dmstr\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu'],

            'items' => [
                ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ['label' => '操作流水', 'icon' => 'dashboard', 'url' => ['/debug']],
                ['label' => 'user', 'icon' => 'circle-o', 'url' => '/user/user-list',],
                ['label' => 'product', 'icon' => 'circle-o', 'url' => '/products/product',],
                ['label' => 'order', 'icon' => 'circle-o', 'url' => '/order/order',],
                ['label' => 'weibo', 'icon' => 'circle-o', 'url' => '/weibo/apply-weibo',],
                ['label' => 'brand', 'icon' => 'circle-o', 'url' => '/brand/brand-list',],

            ],
        ]
    ) ?>

    </section>

</aside>
