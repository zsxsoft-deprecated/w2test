<?php
namespace w2test\Models;

class Base {
  protected $data = [];
  public function query($sql, $data) {
    $mysqli = $GLOBALS['mysqli'];
    $sql = preg_replace_callback('/\@([a-zA-Z0-9_]+)/i', function ($matches) use ($data, $mysqli) {
      $value = $mysqli->real_escape_string($data[$matches[1]]);

      return $value;
    }, $sql);

    return $mysqli->query($sql);
  }

  public function __get($property) {
    return isset($this->data[$property]) ? $this->data[$property] : null;
  }

  public function __set($property, $data) {
    $this->data[$property] = $data;
  }
}
