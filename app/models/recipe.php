<?php

class Recipe extends BaseModel {
    
    public $id, $member_id, $category_id, $name, $method,$username;
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
                'method' => $row['method'],
                'username' => $row['username']
            ));
            return $recipe;
        }
        return null;
    } 
}