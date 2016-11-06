<?php
namespace w2test\ViewModels;

class Post extends Base {
  public $data = [
    'content' => ''
  ];

  public function getSources() {
    return array_merge(parent::getSources(), [
      'content' => $_POST
    ]);
  }
}
