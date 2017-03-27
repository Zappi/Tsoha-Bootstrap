<?php

  $routes->get('/', function() {
    HelloWorldController::home();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

   $routes->get('/categories', function() {
    HelloWorldController::categorylisting();
  });

 $routes->get('/addreceipe', function() {
    HelloWorldController::addreceipe();
  });

 $routes->get('/receipepage', function() {
    HelloWorldController::receipepage();
  });

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/register', function() {
    HelloWorldController::register();
});

$routes->get('/receipes', function() {
    ReceipeController::index();
});
