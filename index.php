<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

require 'vendor/autoload.php';
require 'dao/OnelinerDAO.php';

$app = new \Slim\App;

$app->get('/api/oneliners', function ($request, $response, $args) {
  $onelinerDAO = new OnelinerDAO();
  $result = $onelinerDAO->selectAll();
  $response->write(json_encode($result));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/oneliners', function ($request, $response, $args) {
  $onelinerDAO = new OnelinerDAO();

  $oneliner = $request->getParsedBody();
  $oneliner['created'] = date('Y-m-d H:i:s');
  $result = $onelinerDAO->insert($oneliner);

  if (empty($result)) {
    $response = $response->withStatus(404);
  }

  return $response->write(json_encode($result));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->get('/wedstrijd', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'wedstrijd.php', ['basePath' => $basePath]);
});

$app->run();
