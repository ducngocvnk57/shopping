<?php
namespace frontend\modules\order\models;

use common\models\User;

class Member extends User
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $company;
    public static function tableName()
    {
        return '{{%user}}';
    }
}
