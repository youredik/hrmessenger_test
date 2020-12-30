<?php

namespace app\models;

use yii\base\Model;

/**
 * ProductSearch .
 */
class ProductSearch extends Model
{

    public $id;
    public $title;
    public $user_id;
    public $category_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'category_id'], 'integer'],
            [['title'], 'safe'],
        ];
    }

}
