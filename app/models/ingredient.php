<?php

class Ingredient extends BaseModel {

    public $id, $name;

    public function __constructor($attributes) {
        parent::__constructor($attributes);
    }

        public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Ingredient');
        $query->execute();
       
        $rows = $query->fetchAll();
        $ingredients = array();

        foreach($rows as $row) {
            $ingredients[] = new Ingredient(array(
                'id' => $row['id'],
                'name' => $row['name']
            ));
        }
        return $ingredients;
        }
    }