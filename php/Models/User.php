<?php
namespace w2test\Models;

use w2test\Utils as Utils;

class User extends Base {
  protected $data = [
    'id' => '',
    'username' => '',
    'password' => ''
  ];

  public function __construct($id = null) {
    $cache = Utils\Cache::get('user_' . $id);
    if (!is_null($cache)) {
      $this->data = $cache;

      return;
    }
    if (!is_null($id)) {
      $result = $this->query('SELECT * FROM w2_users WHERE id = @id', ['id' => $id]);
      $row = $result->fetch_object();
      $this->id = $row->id;
      $this->username = $row->username;
      $this->password = $row->password;
      Utils\Cache::set('user_' . $id, $this->data);
    }
  }

  public function login($username, $password) {
    $result = $this->query('SELECT * FROM w2_users WHERE username = "@username" AND password = "@password"', [
      'username' => $username,
      'password' => md5($password)
    ]);
    $row = $result->fetch_object();

    return (isset($row->id)) ? $row->id : false;
  }

  public function register($username, $password) {
    $this->username = $username;
    $this->password = md5($password);
    if ($this->query('INSERT INTO w2_users (username, password) VALUES("@username", "@password")', [
      'username' => $this->username,
      'password' => $this->password
    ])) {
      $this->id = $GLOBALS['mysqli']->insert_id;

      return $this;
    } else {
      return false;
    }
  }
}
