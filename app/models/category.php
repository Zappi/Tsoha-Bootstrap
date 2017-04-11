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
        
        foreach($rows as $row) {
            $categories[] = new Category(array(
              'id' => $row['id'],
              'categoryname' => $row['categoryname']  
            ));
        }
        return $categories;
    }
    
    public static function find($id) {
        
    }
    
    public static function save() {
        
    }
    
    public static function destroy() {
        
    }
}

