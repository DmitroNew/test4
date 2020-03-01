<?php

class ProductController
{
	  /**
     * Action для страницы просмотра товара
     */
    public function actionView($productId)
    {
        // Список категорий
        $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);
    }
}