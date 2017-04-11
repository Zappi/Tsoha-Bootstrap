<?php

class IngredientController extends BaseController{

 public static function findAll() {

        $ingredients = Ingredient::all();

        View::make('/recipe/addrecipe.html', array('ingredients' => $ingredients));
    }
 }