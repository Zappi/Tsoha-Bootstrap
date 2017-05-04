<?php

//Homepage controller
$routes->get('/', function() {
    SiteController::home();
});

//Category controller
$routes->get('/categories', function() {
    CategoryController::findAllForCategoryPage();
});

$routes->get('/register', function() {
    HelloWorldController::register();
});


//Recipe controllers

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


$routes->get('/categories/:category_id', function($category_id) {
    RecipeController::showRecipesWithSameCategory($category_id);
});



//User controllers

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->post('/logout', function() {
    UserController::logout();
});

//Review controllers

$routes->post('/recipepage/:id', function($id) {
    ReviewController::store($id);
});

$routes->post('/recipepage/:id/destroyreview/:reviewid', function($id, $reviewid) {
    ReviewController::delete($id, $reviewid);
});

$routes->get('/recipepage/:id/editreview/:reviewid', function($id, $reviewid) {
    ReviewController::edit($id, $reviewid);
});

$routes->post('/recipepage/:id/editreview/:reviewid', function($id, $reviewid) {
    ReviewController::update($id, $reviewid);
});






