<?php

return [

    // Управление товарами:    
    'product/create' => 'Product/create',
    'product/update/([0-9]+)' => 'Product/update/$1',
    'product/delete/([0-9]+)' => 'Product/delete/$1',
    'product' => 'Product/index',

    // Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
];
