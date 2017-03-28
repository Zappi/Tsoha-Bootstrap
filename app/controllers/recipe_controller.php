<?php

class RecipeController extends BaseController{

 public static function recipes() {
     
     $recipes = Recipe::all();

     View::make('recipe/recipes.html', array('recipes' => $recipes));
}

public static function show($id) {
    $recipe = Recipe::find($id);
    $ingredients = Recipe::findIngredients($id);

    View::make('recipe/recipepage.html', array('recipe' => $recipe, 'ingredients' => $ingredients));
}

 public static function create() {
         $recipes = Recipe::all();
         View::make('recipe/addrecipe.html', array('recipes' => $recipes));
}   


public static function store() {
    $params = $_POST;

    $receipe = new Recipe(array(
        'name' => $params['name'],
        'addtime' => $params['addtime'],
        'method' => $params['method'],
        'username' => $params['username']
    ));
    
    $receipe->save();

    //Redirect::to('/' . $recipe->id, array('message' => 'Resepti lisätty onnistuneesti'));
    }
}