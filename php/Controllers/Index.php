<?php
namespace w2test\Controllers;

use w2test\Models as Models;

class Index extends Base {
  public function do($model) {
    if (is_null($model->uid)) {
      $this->redirect('login');
    }
    if (!is_null($model->content) && $model->content != '') {
      $thread = new Models\Thread();
      $thread->create($model->uid, $model->content);
    }
    $threads = new Models\Threads($model->page);
    $this->view('index', $model, ['threads' => $threads->threads, 'count' => $threads->getCount()]);
  }
}
