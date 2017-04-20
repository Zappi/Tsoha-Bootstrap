<?php

class RecipeController extends BaseController {

    static $failed = false;

    public static function recipes() {

        $recipes = Recipe::all();

        View::make('recipe/recipes.html', array('recipes' => $recipes));
    }

    public static function show($id) {
        $recipe = Recipe::find($id);
        $category = Category::find($recipe->category_id);
        $reviews = Review::find($id);

        var_dump($reviews); //POISTA TÄMÄ KUN TOIMII

        View::make('recipe/recipepage.html', array('recipe' => $recipe, 'category' => $category, 'reviews' => $reviews));
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
            'name' => $params['name'],
            'method' => $params['method'],
            'category_id' => $category,
            'username' => self::get_user_logged_in()->username
        );
        $recipe = new Recipe($attributes);
        $recipe->save();
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

        $failed = true;
        $errors = $recipe->errors();

        if (count($errors) == 0) {

            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Resepti lisätty onnistuneesti!'));
        } else {
            RecipeController::destroy($recipe->id);
            View::make('recipe/addrecipe.html', array('errors' => $errors, 'ingredients' => Ingredient::all(), 'categories' => Category::all()));
        }
    }

    public static function edit($id) {
        self::check_logged_in();
        $recipe = Recipe::find($id);
        $thisRecipesIngredients = Recipe::findIngredientsBetter($id);
        $allIngredients = Ingredient::all();
        $category = Category::find($recipe->category_id);
        $allCategories = Category::all();

        View::make('recipe/edit.html', array('attributes' => $recipe, 'thisRecipesIngredients' => $thisRecipesIngredients, 'ingredients' => $allIngredients, 'category' => $category, 'categories' => $allCategories));
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
        $recipe->update();

        $errors = $recipe->errors();


        if (count($errors) > 0) {
            View::make('recipe/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {

            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Reseptiä muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $recipe = new Recipe(array('id' => $id));
        $recipeIngredient = new RecipeIngredient(array('recipe_id' => $id));

        $recipeIngredient->destroy();
        $recipe->destroy();


        if ($failed = false) {
            Redirect::to('/recipes');
        } else {
            $failed = false;
        }
    }

}
