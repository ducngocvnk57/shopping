<?php
namespace frontend\models;

use common\models\LoginForm;
use frontend\modules\user\models\Member;
class MemberLoginForm extends LoginForm
{
  private $_user;
  protected function getUser()
  {
      if ($this->_user === null) {
          $this->_user = Member::findByUsername($this->username);
      }

      return $this->_user;
  }
}
?>
