<?php
/**
 * Created by PhpStorm.
 * User: ducngoc
 * Date: 19/10/2016
 * Time: 18:17
 */

namespace common\models\read;

use yii\db\ActiveRecord;
use yii;

abstract class Read extends ActiveRecord
{
  public static function getDb()
  {
    return Yii::$app->db2;
  }
}