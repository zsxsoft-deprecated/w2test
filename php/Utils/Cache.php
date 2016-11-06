<?php
namespace w2test\Utils;

class Cache {
  protected static $cache = [];

  public static function get($name) {
    return isset(self::$cache[$name]) ? self::$cache[$name] : null;
  }

  public static function set($name, $value) {
    self::$cache[$name] = $value;
  }
}
