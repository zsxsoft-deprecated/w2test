<?php
namespace w2test\Controllers;

use w2test\Models as Models;

class Delete extends Base {
  public function do($model) {
    if (is_null($model->uid)) {
      $this->redirect('login');
    }
    if (!is_null($model->id) && $model->id > 0) {
      $thread = new Models\Thread($model->id);
      if ($thread->uid == $model->uid) {
        $thread->delete();
      }
    }
    $this->redirect('');
  }
}
