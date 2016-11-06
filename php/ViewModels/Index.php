<?php
namespace w2test\ViewModels;

class Index extends Base {
  public $data = [
    'page' => 1
  ];

  public function getSources() {
    return array_merge(parent::getSources(), [
      'page' => $_GET
    ]);
  }
}
