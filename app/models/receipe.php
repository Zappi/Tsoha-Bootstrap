<?php

class Receipe extends BaseModel {
    
    public $id, $member_id, $category_id, $name, $method, $addTIme, $username;
    //Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes); 
        
        
    } 

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Receipe');

        $query->execute();

        $rows = $query->fetchAll();
        $receipes = array();

        foreach($rows as $row) {
            $receipes[] = new Receipe(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'category_id' => $row['category_id'],
                'name' => $row['name'],
                'method' => $row['method'],
                'addTime' => $row['addTime'],
                'username' => $row['username']
            ));
        }
        return $receipes;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Receipe WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row) {
            $receipe = new Receipe(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'category_id' => $row['category_id'],
                'name' => $row['name'],
                'method' => $row['method'],
                'addTime' => $row['addTime'],
                'username' => $row['username']
            ));
            return $receipe;
        }
        return null;
    } 
}