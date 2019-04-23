<?php

$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => 'localhost',
    'username' => 'grad',
    'password' => 'grad24',
    'db' => 'test_chat'
  ),
  'logs_path' => 'logs',
  'count_display_messages' => 10
);

spl_autoload_register(function($class){
  require_once 'classes/'.$class.'.php';
});


?>