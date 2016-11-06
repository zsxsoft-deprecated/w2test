<?php
namespace w2test\Controllers;

use w2test\Models as Models;

class Login extends Base {
  public function do($model) {
    if (!is_null($model->username)) {
      $user = new Models\User();
      $uid = ($user->Login($model->username, $model->password));
      if ($uid != false) {
         $_SESSION['uid'] = $uid;
         $this->redirect('');
      }
      // Login here
    }
    $this->view('Login', $model);
  }
}
