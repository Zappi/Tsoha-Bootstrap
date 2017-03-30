<?php

class RecipeController extends BaseController{

 public static function recipes() {
     
     $recipes = Recipe::all();

     View::make('recipe/recipes.html', array('recipes' => $recipes));
}

public static function show($id) {
    $recipe = Recipe::find($id);
    $ingredients = Recipe::findIngredients($id);
    $amount = $ingredients[0];
    $ingredients = $ingredients[1];

    View::make('recipe/recipepage.html', array('recipe' => $recipe, 'ingredients' => $ingredients, 'amounts' => $amount));
}

 public static function create() {
         $recipes = Recipe::all();
         $ingredients = Ingredient::all();
         View::make('recipe/addrecipe.html', array('recipes' => $recipes, 'ingredients' => $ingredients));
}   


public static function store() {
    
    $params = $_POST;

    $recipe = new Recipe(array(
        'name' => $params['name'],
        'method' => $params['method'],
        'username' => '#KORJAATÄMÄ'
    ));
    
    $recipe->save();

    Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Resepti lisätty onnistuneesti'));
    }
}