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
        $category = Category::find($recipe->category_id);

        View::make('recipe/recipepage.html', array('recipe' => $recipe, 'category' => $category /* 'ingredients' => $ingredients/*, 'amounts' => $amount */));
    }

    public static function create() {
        self::check_logged_in();
        $recipes = Recipe::all();
        $ingredients = Ingredient::all();
        $categories = Category::all();
        
        
        View::make('recipe/addrecipe.html', array('recipes' => $recipes, 'ingredients' => $ingredients, 'categories' => $categories));
    }

    public static function store() {
        self::check_logged_in();
        $params = $_POST;
        $errors = array();
        
        $category = $params['category'];

        $attributes = array(
            'category_id' => $category,
            'name' => $params['name'],
            'method' => $params['method'],
            'username' => self::get_user_logged_in()->username
        );
        $recipe = new Recipe($attributes);

        $ingredients = $params['ingredients'];
        $amounts = $params['amounts'];


        for ($x = 0; $x < count($ingredients); $x++) {

            if ($ingredients[$x] == -1) {
                continue;
            }

            $ingredientsAndAmounts = array(
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredients[$x],
                'amount' => $amounts[$x]
            );

            $recipeIngredient = new RecipeIngredient($ingredientsAndAmounts);
            $recipeIngredient->save();
        }


        $errors = array_merge($errors, $recipe->errors());


        if (!$errors) {
            $recipe->save();
            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Resepti lisätty onnistuneesti!'));
            
        } else {
            View::make('recipe/addrecipe.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function edit($id) {
        self::check_logged_in();
        $recipe = Recipe::find($id);
        $thisRecipesIngredients = Recipe::findIngredientsBetter($id);
        $allIngredients = Ingredient::all();
        $category = Category::find($recipe->category_id);
        $allCategories = Category::all();
        
        View::make('recipe/edit.html', array('attributes' => $recipe,'thisRecipeIngredients' => $thisRecipesIngredients, 'ingredients' => $allIngredients, 'category' => $category, 'categories' => $allCategories));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;
        
        
        $category = $params['category'];

        $attributes = array(
            'category_id' => $category,
            'name' => $params['name'],
            'method' => $params['method'],
            'username' => self::get_user_logged_in()->username
        );

        $recipe = new Recipe($attributes);
        $recipe->id = $id;

        $errors = $recipe->errors();


        if (count($errors) > 0) {
            View::make('recipe/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $recipe->update();
            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Reseptiä muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $recipe = new Recipe(array('id' => $id));
        $recipeIngredient = new RecipeIngredient(array('recipe_id' => $id));

        $recipeIngredient->destroy();
        $recipe->destroy();



        Redirect::to('/recipes', array('deletemessage' => 'Resepti poistettu onnistuneesti!'));
    }

}
