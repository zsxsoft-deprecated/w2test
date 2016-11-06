<?php
namespace w2test\ViewModels;

class Delete extends Base {
  public $data = [
    'id' => 1,
  ];

  public function getSources() {
    return array_merge(parent::getSources(), [
      'id' => $_GET,
    ]);
  }
}
