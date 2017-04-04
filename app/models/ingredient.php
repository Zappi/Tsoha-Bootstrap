<?php

class Ingredient extends BaseModel {

    public $id, $ingredientname;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

        public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Ingredient');
        $query->execute();
       
        $rows = $query->fetchAll();
        $ingredients = array();

        foreach($rows as $row) {
            $ingredients[] = new Ingredient(array(
                'id' => $row['id'],
                'ingredientname' => $row['ingredientname']
            ));
        }
        
        var_dump($ingredients);
        
        return $ingredients;
        }
    }