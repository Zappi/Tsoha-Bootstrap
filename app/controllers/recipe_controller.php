<?php

class RecipeController extends BaseController {

    public static function recipes() {

        $recipes = Recipe::all();

        View::make('recipe/recipes.html', array('recipes' => $recipes));
    }

    public static function show($id) {
        $recipe = Recipe::find($id);
        //$ingredients = Recipe::findIngredientsBetter($id);
        //$amount = $ingredients[0];
        //$ingredients = $ingredients[1];

        View::make('recipe/recipepage.html', array('recipe' => $recipe, /* 'ingredients' => $ingredients/*, 'amounts' => $amount */));
    }

    public static function create() {
        $recipes = Recipe::all();
        $ingredients = Ingredient::all();
        View::make('recipe/addrecipe.html', array('recipes' => $recipes, 'ingredients' => $ingredients));
    }

    public static function store() {
        $params = $_POST;
        
        $attributes = array(
            'name' => $params['name'],
            'method' => $params['method'],
            'username' => 'Zappi'
        );
        $recipe = new Recipe($attributes);
        $recipe->save();
        
        
        $ingredients = $params['ingredients'];
        $amounts = $params['amounts'];
 
        
        for ($x = 0; $x <count($ingredients); $x++) {
            
            if($ingredients[$x] == -1) {
                continue;
            }
            
        $ingredientsAndAmounts = array(
            'recipe_id'=>$recipe->id,
            'ingredient_id'=> $ingredients[$x],
            'amount'=>$amounts[$x]
        );
        
        $recipeIngredient = new RecipeIngredient($ingredientsAndAmounts);
        $recipeIngredient->save();

        }
     
        
        $errors = $recipe->errors();

        if (count($errors) == 0) {
            //Recipe works
            
            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Resepti lisätty onnistuneesti'));
        } else {
            //Something wrong with recipe
            View::make('recipe/addrecipe.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function edit($id) {
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();
        View::make('recipe/edit.html', array('attributes' => $recipe, 'ingredients' => $ingredients));
    }

    public static function update($id) {

        $params = $_POST;

        $attributes = array(
            'name' => $params['name'],
            'method' => $params['method'],
            'username' => 'Zappi'
        );

        $recipe = new Recipe($attributes);
        $recipe->id = $id;

        $errors = $recipe->errors();


        if (count($errors) > 0) {
            View::make('recipepage/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $recipe->update();
            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Reseptiä muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        
        $recipe = new Recipe(array('id' => $id));
        $recipeIngredient = new RecipeIngredient(array('recipe_id' => $id));

        $recipeIngredient->destroy();
        $recipe->destroy();
        
        

        Redirect::to('/recipes', array('deletemessage' => 'Resepti poistettu onnistuneesti!'));
    }

}
