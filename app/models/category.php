<?php

class Category extends BaseModel {

    public $id, $categoryname;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Category');
        $query->execute();

        $rows = $query->fetchAll();
        $categories = array();

        foreach ($rows as $row) {
            $categories[] = new Category(array(
                'id' => $row['id'],
                'categoryname' => $row['categoryname']
            ));
        }
        return $categories;
    }

    public static function find($id) {

        $query = DB::connection()->prepare('SELECT * FROM Category WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

         if($row) {
            $category = new Category(array(
                'categoryname' => $row['categoryname']
            ));
            return $category;
        }
        
        return null;
    
    }

    public static function save() {
        
    }

    public static function destroy() {
        
    }

}
