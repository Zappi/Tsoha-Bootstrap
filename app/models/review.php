<?php

class Review extends BaseModel {
    
    public $member_id, $recipe_id, $username, $addtime, $message;
            
    public function __construct($attributes) {
     parent::__construct($attributes);
 }
     public static function all() {
       
    }

    public static function find($recipe_id) {

    
    }

    public static function save() {
        
    }

    public static function destroy() {
        
    }
 
 
 
 
 
            
}
