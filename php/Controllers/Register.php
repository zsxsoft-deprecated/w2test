<?php
namespace w2test\Controllers;

use w2test\Models as Models;

class Register extends Base {
  public function do($model) {
    if (!is_null($model->username)) {
      $user = new Models\User();
      $user = $user->Register($model->username, $model->password);
      if ($user != false) {
        $_SESSION['uid'] = $user->id;
        $this->redirect('index');
      }
    }
    $this->view('Register', $model);
  }
}
