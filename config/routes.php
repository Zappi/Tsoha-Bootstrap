<?php

  $routes->get('/', function() {
    HelloWorldController::etusivu();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

   $routes->get('/kategoriat', function() {
    HelloWorldController::kategorialistaus();
  });

 $routes->get('/lisaaresepti', function() {
    HelloWorldController::reseptinlisays();
  });

 $routes->get('/reseptisivu', function() {
    HelloWorldController::reseptisivu();
  });