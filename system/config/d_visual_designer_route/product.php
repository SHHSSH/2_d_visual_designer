<?php
//Название конфига
$_['name']              = 'Product';
//Статус Frontend редатора
$_['frontend_status']   = '1';
//GET параметр route в админке
$_['backend_route']     = 'catalog/product/edit';
//REGEX для GET параметров route в админке
$_['backend_route_regex'] = 'catalog/product/*';
//GET параметр route на Frontend
$_['frontend_route']    = 'product/product';
//GET параметр содержащий id страницы в админке
$_['backend_param']     = 'product_id';
//GET параметр содержащий id страницы на Frontend
$_['frontend_param']    = 'product_id';
//Путь для сохранения описания на Frontend
$_['edit_url']          = 'index.php?route=extension/d_visual_designer/designer/saveProduct';
//События
$_['events']            = array(
    'admin/view/catalog/product_form/after' => 'extension/event/d_visual_designer/view_product_after',
    'catalog/view/product/product/before' => 'extension/event/d_visual_designer/view_product_before',
    'catalog/view/extension/module/featured/before' => 'extension/event/d_visual_designer/view_module_feautured_before',
    'catalog/view/module/featured/before' => 'extension/event/d_visual_designer/view_module_feautured_before',
    'catalog/model/catalog/product/getProducts/after' => 'extension/event/d_visual_designer/model_getProducts_after',
    'catalog/model/catalog/product/getProductSpecials/after' => 'extension/event/d_visual_designer/model_getProducts_after',
    'catalog/model/catalog/product/getBestSellerProducts/after' => 'extension/event/d_visual_designer/model_getProducts_after',
    'catalog/model/catalog/product/getProductRelated/after' => 'extension/event/d_visual_designer/model_getProducts_after',
    );