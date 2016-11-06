<?php
namespace w2test\Controllers;

use w2test\Models as Models;

class Base {
  public function view($template, $model = null, $values = []) {
    foreach ($values as $key => $value) {
      $$key = $value;
    }

    $user = new Models\User($model->uid);
    //ob_clean();
    include_once 'Views/Base.php';
    include 'Views/' . $template . '.php';

    return true;
  }

  public function redirect($action) {
    header('HTTP/1.1 302 Moved');
    header('Location: ?action='. $action);
    exit;
  }
}
