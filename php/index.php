<?php
// Initialize all global objects here
// It will never be a huge project
// So let's do it as quick as possible!
namespace w2test;

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
$config = json_decode(file_get_contents('./config.json'));
$mysqli = new \mysqli($config->hostname, $config->username, $config->password, $config->database);
$action = ucfirst(isset($_GET['action']) && $_GET['action'] != '' ? $_GET['action'] : 'index');
$startTime = microtime(true);

spl_autoload_register(function ($class) {
  $realName = str_replace('w2test\\', '', $class) . '.php';
  $path = realpath($realName);
  if ($path == false) {
    throw new \Exception($realName . ' Not Found!');
  }
  require $path;
});

try {
  $controllerName = __NAMESPACE__ . '\\Controllers\\' . $action;
  $modelName = __NAMESPACE__ . '\\ViewModels\\' . $action;

  $controller = new $controllerName();
  $controller->do(new $modelName());
} catch (Exception $e) {
  var_dump($e);
}

$mysqli->close();
