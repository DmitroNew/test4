<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{
    public function actionIndex()
    {

        // Получаем список товаров
        $productsList = Product::getProductsList();

        // Подключаем вид
        require_once(ROOT . '/views/product/index.php');
        return true;
    }

    /**
     * Action для страницы просмотра товара
     */
    public function actionView($productId)
    {
        // Список категорий
        $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);

        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

    public function actionCreate()
    {

        // Получаем список категорий
        $categoriesList = Category::getCategoriesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['description'] = $_POST['description'];
            $options['status'] = $_POST['status'];
        }
    }

    /**
     * Action Редактировать товар
     */
    public function actionUpdate($id)
    {

        // Получаем список категорий
        $categoriesList = Category::getCategoriesList();

        // Получаем данные о конкретном товаре
        $product = Product::getProductById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['description'] = $_POST['description'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {

                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/product/update.php');
        return true;
    }

     /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/product/delete.php');
        return true;
    }

}
