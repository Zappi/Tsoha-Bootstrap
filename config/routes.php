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

 $routes->get('/addrecipe', function() {
    HelloWorldController::addrecipe();
  });

 $routes->get('/recipepage', function() {
    HelloWorldController::recipepage();
  });

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/register', function() {
    HelloWorldController::register();
});

$routes->get('/recipes', function() {
    RecipeController::index();
});
