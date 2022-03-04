<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property float $price
 * @property float $old_price
 * @property string $description
 * @property string $keywords
 * @property string $img
 * @property boolean $is_offer
 *
 * @property string category app\models\Category
 *
 */
class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }



    public function getCategory()
    {
        //id - Category, category_id = this (Product)
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}