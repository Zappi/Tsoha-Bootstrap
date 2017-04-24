<?php

$routes->get('/', function() {
    SiteController::home();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/categories', function() {
    HelloWorldController::categorylisting();
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

$routes->get('/recipepage/:id/edit', function($id) {
    RecipeController::edit($id);
});

$routes->post('/recipepage/:id/edit', function($id) {
    RecipeController::update($id);
});

$routes->post('/recipepage/:id/destroy', function($id) {
    RecipeController::destroy($id);
});

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->post('/recipepage/:id', function($id) {
    ReviewController::store($id);
});

$routes->post('/recipepage/:id/destroyreview/:reviewid', function($id, $reviewid) {
    ReviewController::delete($id, $reviewid);
});




