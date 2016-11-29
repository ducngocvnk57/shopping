<?php
namespace frontend\modules\user\models;

use common\models\LoginForm;
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
