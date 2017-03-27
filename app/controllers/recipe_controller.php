<?php

class RecipeController extends BaseController{

 public static function index() {
     
     $receipes = Receipe::all();

     View::make('recipe/index.html', array('recipes' => $recipes));
 }

}