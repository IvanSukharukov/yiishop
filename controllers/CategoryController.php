<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    //test commit
    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Категории не существует');
        }
        $products = Product::find()->where(['category_id' => $id])->all();
        return $this->render('view', ['products' => $products]);

/*        То же самое, что выше
        В моделе связь
        public function getProducts()
        {
            return $this->hasMany(Product::class, ['category_id' => 'id']);
        }
        return $this->render('view', ['category' => $category]);
        $category->products; // обращение в виде*/
    }
}