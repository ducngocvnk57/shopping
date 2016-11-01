<?php
namespace frontend\modules\search\models;



use common\models\read\Read;

class Product extends Read
{
    public static function tableName()
    {
        return 'cms_products_item';
    }
}