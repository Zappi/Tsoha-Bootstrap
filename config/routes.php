<?php

  $routes->get('/', function() {
    HelloWorldController::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

   $routes->get('/categories', function() {
    HelloWorldController::kategorialistaus();
  });

 $routes->get('/addreceipe', function() {
    HelloWorldController::reseptinlisays();
  });

 $routes->get('/receipepage', function() {
    HelloWorldController::reseptisivu();
  });