<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

require 'vendor/autoload.php';
require 'dao/OrderDAO.php';
require 'dao/ReviewDAO.php';
require 'dao/UsersDAO.php';

$app = new \Slim\App;

$app->get('/api/orders', function ($request, $response, $args) {
  $orderDAO = new OrderDAO();
  $orders = $orderDAO->selectAll();
  return $response->write(json_encode($orders))
    ->withHeader('Content-Type','application/json');
});

$app->get('/api/users', function ($request, $response, $args) {
  $usersDAO = new UsersDAO();
  $users = $usersDAO->selectAll();
  return $response->write(json_encode($users))
    ->withHeader('Content-Type','application/json');
});

$app->get('/api/users/{id}', function ($request, $response, $args) {
  $usersDAO = new UsersDAO();
  $user = $usersDAO->selectById($args['id']);
  $response->write(json_encode($user))
    ->withHeader('Content-Type','application/json');
  if (empty($user)) {
    $response = $response->withStatus(404);
  }
  return $response;
});

$app->get('/api/reviews', function ($request, $response, $args) {
  $reviewDAO = new ReviewDAO();
  $id['status'] = 0;
  $reviews = $reviewDAO->selectAllByStatus($id['status']);
  return $response->write(json_encode($reviews))
    ->withHeader('Content-Type','application/json');
});

$app->get('/', function ($request, $response, $args) {
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'home.php', ['basePath' => $basePath]);
});

$app->get('/wedstrijd', function ($request, $response, $args) {
  $reviewDAO = new ReviewDAO();
  $users = json_encode($reviewDAO->selectAllReviewsAndUsers());
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'wedstrijd.php', ['basePath' => $basePath, 'users' => $users, 'registered' => 0]);
});

$app->post('/register', function ($request, $response, $args) use ($app) {
  $usersDAO = new UsersDAO();
  $orderDAO = new OrderDAO();
  $user = $request->getParsedBody();

  $insertedUser = $usersDAO->insert($user);
  $insertedOrder = $orderDAO->insert($insertedUser);

  $reviewDAO = new ReviewDAO();
  $users = json_encode($reviewDAO->selectAllReviewsAndUsers());
  $view = new \Slim\Views\PhpRenderer('view/');
  $basePath = $request->getUri()->getBasePath();
  return $view->render($response, 'wedstrijd.php', ['basePath' => $basePath, 'users' => $users, 'user' => $user, 'registered' => 1]);
});

$app->post('/login', function ($request, $response, $args) {
  $usersDAO = new UsersDAO();
  $loginData = $request->getParsedBody();

  $login = $usersDAO->loginCheck($loginData);

  if ($login) {
    $reviewDAO = new ReviewDAO();
    $users = json_encode($reviewDAO->selectAllReviewsAndUsers());
    $view = new \Slim\Views\PhpRenderer('view/');
    $basePath = $request->getUri()->getBasePath();
    return $view->render($response, 'wedstrijd.php', ['basePath' => $basePath, 'users' => $users, 'user' => $user, 'registered' => 1]);
  }
});

$app->run();
