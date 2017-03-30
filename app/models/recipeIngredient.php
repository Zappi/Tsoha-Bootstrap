<?php

class RecipeIngredient extends BaseModel {

    public $recipe_id, $ingredient_id, $amount;

      public function __construct($attributes) {
        parent::__construct($attributes);       
        
    } 

}