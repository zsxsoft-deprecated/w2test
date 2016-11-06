<?php
namespace w2test\ViewModels;

use w2test\Models as Models;

class Base {
  public $data = [
    'user' => ''
  ];

  public function getSources() {
    $dataSources = [
      'uid' => $_SESSION
    ];

    return $dataSources;
  }

  public function __construct() {
    foreach ($this->getSources() as $key => $value) {
      if (isset($value[$key])) {
        $this->data[$key] = $value[$key];
      } elseif (!isset($this->data[$key])) {
        $this->data[$key] = null;
      }
    }
    if (!is_null($this->uid)) {
      $this->user = new Models\User($this->uid);
    }
  }

  public function __get($property) {
    return isset($this->data[$property]) ? $this->data[$property] : null;
  }

  public function __set($property, $data) {
    $this->data[$property] = $data;
  }

}
