<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $description
 * @property string $keywords
 *
 */
class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }
}