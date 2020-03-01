<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        
        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }


}
