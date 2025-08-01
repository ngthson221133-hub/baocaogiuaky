<?php
// controller/home.php

include_once 'model/products.php';
include_once 'model/categories.php';

function indexAction($smarty) {
    $products = new products();
    $categories = new categories();
    $all_products = $products->list_all();
    $all_categories = $categories->list_all();
    $smarty->assign('products', $all_products);
    $smarty->assign('categories', $all_categories);
    $smarty->assign('mainContent', 'home/index.tpl');
} 