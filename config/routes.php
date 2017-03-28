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

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/register', function() {
    HelloWorldController::register();
});

$routes->get('/recipes', function() {
    RecipeController::recipes();
});

$routes->post('/recipes', function() {
  RecipeController::store();
});

 $routes->get('/recipes/addrecipe', function() {
    RecipeController::create();
  });

$routes->get('/recipepage/:id', function($id) {
    RecipeController::show($id);
});
