<?php
namespace w2test\Models;

class Thread extends Base {
  protected $data = [
    'id' => '',
    'uid' => '',
    'content' => '',
    'timestamp' => ''
  ];

  public function __construct($id = null) {
    if (!is_null($id)) {
      $result = $this->query('SELECT * FROM w2_threads WHERE id = @id', ['id' => $id]);
      $row = $result->fetch_object();
      $this->id = $row->id;
      $this->uid = $row->uid;
      $this->content = $row->content;
      $this->timestamp = $row->timestamp;
    }
  }

  public function create($uid, $content) {
    $this->uid = $uid;
    $this->content = $content;
    $this->timestamp = time();
    if ($this->query('INSERT INTO w2_threads (uid, content, timestamp) VALUES("@uid", "@content", @timestamp)', [
      'uid' => $uid,
      'content' => $content,
      'timestamp' => $this->timestamp
    ])) {
      $this->id = $GLOBALS['mysqli']->insert_id;

      return $this;
    } else {
      return false;
    }
  }

  public function delete() {
    $this->query('DELETE FROM w2_threads WHERE id = @id', ['id' => $this->id]);
    
  }
}
