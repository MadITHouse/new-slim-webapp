<?php
require __DIR__ . '/../libs/autoload.php';
require __DIR__ . '/config.php';
$app = new \Slim\App([
  'settings' => $settings,
]);
require __DIR__ .'/container.php';
require __DIR__ .'/routes.php';
$app->run();

?>
