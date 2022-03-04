<?php


namespace app\controllers;


use app\models\Product;
use yii\data\Pagination;

class SearchController extends AppController
{
    public function actionSearch()
    {
        $q = \Yii::$app->request->get('q');
        $this->setMeta("Поиск: {$q}:: " . \Yii::$app->name,);
        if(!$q){
            return $this->render('search');
        }

        $query = Product::find()->where(['like', 'title', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', [
            'products' => $products,
            'pages' => $pages,
            'q' => $q,
        ]);
    }
}