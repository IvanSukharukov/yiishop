<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
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
        $this->setMeta(
            "{$category->title} :: " . \Yii::$app->name,
            "$category->keywords",
            $category->description
        );
//        $products = Product::find()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 1,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        return $this->render('view', [
            'products' => $products,
            'category' => $category,
            'pages' => $pages,
        ]);


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