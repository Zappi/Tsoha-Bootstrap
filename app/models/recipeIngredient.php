<?php

class RecipeIngredient extends BaseModel {

    public $recipe_id, $ingredient_id, $amount, $ingredientname;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO RecipeIngredient (recipe_id, ingredient_id, amount) VALUES
        (:recipe_id, :ingredient_id, :amount');

        $query->execute(array(
            'name' => $this->name,
            'method' => $this->method,
            'username' => $this->username));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

}
