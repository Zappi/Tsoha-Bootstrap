<?php

class Recipe extends BaseModel {
    
    public $id, $member_id, $category_id, $name, $addtime, $method,$username;
    //Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes); 
        
        
    } 

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Recipe');
        $query->execute();

        $rows = $query->fetchAll();
        $recipes = array();

        foreach($rows as $row) {
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

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Recipe WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row) {
            $recipe = new Recipe(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'category_id' => $row['category_id'],
                'name' => $row['name'],
                'addtime' => $row['addtime'],
                'method' => $row['method'],
                'username' => $row['username'],
                'ingredients' => findIngredients('id')
            ));
            return $recipe;
        }
        return null;
    } 

    public static function findIngredients($id) {    
        $query = DB::connection()->prepare('SELECT Ingredient.name, Ingredient.amount FROM Recipe, Ingredient, 
        RecipeIngredient WHERE Recipe.id = :id AND RecipeIngredient.recipe_id = Recipe.id 
        AND RecipeIngredient.ingredient_id = Ingredient.id');
        
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $ingredients = array();        

        foreach ($rows as $row) {
            $ingredients[] = new Ingredient(array(
                'amount' => $row['amount'],
                'name' => $row['name']
            ));
        }
            return $ingredients;
        }

        //haeAineosat joka parametrina resepti id
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Receipe (name, addtime, method, username) VALUES
        (:name, now(), :method, :username RETURNING id');

        $query->execute(array(
            name => $this->name, 
            method => $this->method,
            addtime => $this->addtime,
            username => $this->username));

            $row = $query->fetch();
            
            $this->id = $row['id'];
    }        
}