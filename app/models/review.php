<?php

class Review extends BaseModel {

    public $member_id, $recipe_id, $username, $addtime, $message;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function find($recipe_id) {
        $query = DB::connection()->prepare('SELECT * FROM Review WHERE recipe_id = :recipe_id');
        $query->execute(array($recipe_id));
        $rows = $query->fetchAll();

        $reviews = array();

        if ($rows) {
            foreach ($rows as $row) {
                $reviews[] = new Review(array(
                    'member_id' => $row['member_id'],
                    'addtime' => $row['addtime'],
                    'username' => $row['username'],
                    'message' => $row['message']
                ));
            }
            return $reviews;
        }
        return null;
    }

    public function all() {
        
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Review (member_id, recipe_id, username, addtime, message) VALUES 
        (:member_id, :recipe_id, :username, CURRENT_TIMESTAMP, :message)');

        $query->execute(array(
            'member_id' => $this->member_id,
            'recipe_id' => $this->recipe_id,
            'username' => $this->username,
            'message' => $this->message));

        $row = $query->fetch();
    }

    public static function destroy() {
        
    }

}
