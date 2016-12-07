<?php

namespace backend\models;
use yii\db\ActiveRecord;

class PriceRange extends ActiveRecord
{
  public function rules()
  {
      return [
          ['from_price', 'number'],
          ['from_price', 'required'],
          ['to_price','number'],
          ['to_price','required']
      ];
  }
  public static function tableName()
  {
      return '{{%price_range}}';
  }
}
