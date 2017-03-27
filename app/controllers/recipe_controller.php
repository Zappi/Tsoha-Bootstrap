<?php

class RecipeController extends BaseController{

 public static function index() {
     
     $recipes = Recipe::all();

     View::make('recipe/index.html', array('recipes' => $recipes));
 }

}