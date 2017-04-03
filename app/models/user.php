<?php

class User extends BaseModel {
    
    public $id, $username, $password, $email, $registered, $admin;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function authenticate($username, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Member WHERE username = :username AND password = :password LIMIT 1');
        
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();
        
        if($row) {
            return new User(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                'email' => $row['email'],
                'registered' => $row['registered'],
                'admin' => $row['admin']
            ));
        } else {
            return null;
        }
    
    }
    
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Member WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if($row) {
            $member = new User(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                'email' => $row['email'],
                'registered' => $row['registered'],
                'admin' => $row['admin']
            ));
            return $member;
        }
        return null;
    }
    
    
}