<?php
namespace w2test\Models;

class Threads extends Base {
  protected $data = [
    'threads' => []
  ];

  public function getCount() {
    $result = $this->query('SELECT COUNT(id) AS result FROM w2_threads', []);

    return $result->fetch_object()->result;
  }

  public function __construct($page = 1) {
    $limit = ($page - 1) * 10;
    $result = $this->query('SELECT * FROM w2_threads ORDER BY id DESC LIMIT @limit, @pagesize', [
      'limit' => $limit,
      'pagesize' => $GLOBALS['config']->pagesize
    ]);
    while ($row = $result->fetch_object()){
        $row->user = new User($row->uid);
        $this->data['threads'][] = $row;
    }
  }

}
