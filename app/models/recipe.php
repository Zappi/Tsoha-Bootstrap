<?php

class Recipe extends BaseModel {

    public $id, $member_id, $category_id, $name, $addtime, $method, $username, $ingredient, $ingredientname;

    //Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_string_length', 'validate_max_string_length');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Recipe');
        $query->execute();

        $rows = $query->fetchAll();
        $recipes = array();

        foreach ($rows as $row) {
            $recipes[] = new Recipe(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'category_id' => $row['category_id'],
                'name' => $row['name'],
                'addtime' => $row['addtime'],
                'method' => $row['method'],
                'username' => $row['username']
            ));
        }
        return $recipes;
    }

    public static function findAllWithSameCategory($category_id) {

        $query = DB::connection()->prepare('SELECT * FROM Recipe WHERE category_id = :category_id');
        $query->execute(array('category_id' => $category_id));
        $rows = $query->fetchAll();

        foreach ($rows as $row) {
            $recipes[] = new Recipe(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'category_id' => $category_id,
                'name' => $row['name'],
                'addtime' => $row['addtime'],
                'method' => $row['method'],
                'username' => $row['username'],
            ));
           
        }
        
        if($rows == null) {
            return null;
        }
            
        return $recipes;
        
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Recipe WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $ingredientFinder = Recipe::findIngredientsBetter($id);
            $recipe = new Recipe(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'category_id' => $row['category_id'],
                'name' => $row['name'],
                'addtime' => $row['addtime'],
                'method' => $row['method'],
                'username' => $row['username'],
            ));
            $recipe->ingredient = $ingredientFinder;

            return $recipe;
        }

        return null;
    }

    public static function findIngredientsBetter($id) {
        $query = DB::connection()->prepare('SELECT * FROM recipeingredient INNER JOIN ingredient ON recipeingredient.ingredient_id = ingredient.id WHERE recipeingredient.recipe_id = :id');

        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();

        $list = array();

        foreach ($rows as $row) {
            $list[] = new RecipeIngredient(array(
                'recipe_id' => $row['recipe_id'],
                'ingredient_id' => $row['ingredient_id'],
                'amount' => $row['amount'],
                'ingredientname' => $row['ingredientname']
            ));
        }
        return $list;
    }

    public static function findIngredients($id) {
        $query = DB::connection()->prepare('SELECT Ingredient.name, RecipeIngredient.amount as amount FROM Recipe, Ingredient,
        RecipeIngredient WHERE Recipe.id = :id AND RecipeIngredient.recipe_id = Recipe.id
        AND RecipeIngredient.ingredient_id = Ingredient.id');

        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();

        $ingredients = array();
        $amounts = array();

        foreach ($rows as $row) {
            $ingredients[] = new Ingredient(array(
                'name' => $row['name']
            ));
        }

        foreach ($rows as $row) {
            $amounts[] = new RecipeIngredient(array(
                'amount' => $row['amount']
            ));
        }

        $placeholder = array($amounts, $ingredients);
        return $placeholder;
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Recipe (category_id, name, addtime, method, username) VALUES
        (:category_id, :name, CURRENT_TIMESTAMP, :method, :username) RETURNING id');

        $query->execute(array(
            'category_id' => $this->category_id,
            'name' => $this->name,
            'method' => $this->method,
            'username' => $this->username));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Recipe SET name = :name, method = :method, username = :username WHERE id = :id');
        $query->execute(array(
            'id' => $this->id,
            'name' => $this->name,
            'method' => $this->method,
            'username' => $this->username));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Recipe WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function validate_name() {
        $errors = array();
        $errors[] = parent::validate_name($this->name, 'Reseptin nimi');
        $errors[] = parent::validate_name($this->method, 'Resepti');
        return $errors;
    }

    public function validate_string_length() {
        $errors = array();
        $errors[] = parent::validate_string_length($this->name, 'Reseptin nimen ', 4);
        $errors[] = parent::validate_string_length($this->method, 'Reseptin ', 10);
        return $errors;
    }
    
    public function validate_max_string_length() {
        $errors = array();
        $errors[] = parent::validate_max_string_length($this->name, 'Reseptin nimen', 30);
        $errors[] = parent::validate_max_string_length($this->method, 'Reseptin', 4000);
        return $errors;
    }

}
