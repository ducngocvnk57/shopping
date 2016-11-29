<?php
namespace frontend\modules\user\models;

use common\models\User;

class Member extends User
{
    public static function tableName()
    {
        return '{{%member}}';
    }
}
