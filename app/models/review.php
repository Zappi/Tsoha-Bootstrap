<?php

class Review extends BaseModel {

    public $id, $member_id, $recipe_id, $username, $addtime, $message;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_string_length', 'validate_max_string_length');
    }
    
    public static function findSingleReview($id, $reviewid) {
        $query = DB::connection()->prepare('SELECT * FROM Review WHERE id = :reviewid');
        $query->execute(array($reviewid));
        $row = $query->fetch();
        
        if($row) {
            $review = new Review(array(
                'id' => $row['id'],
                'member_id' => $row['member_id'],
                'recipe_id' => $row['recipe_id'],
                'username' => $row['username'],
                'addtime' => $row['addtime'],
                'message' => $row['message']
            ));
            return $review;
        }
        
        return null;
    }

    public static function find($recipe_id) {
        $query = DB::connection()->prepare('SELECT * FROM Review WHERE recipe_id = :recipe_id');
        $query->execute(array($recipe_id));
        $rows = $query->fetchAll();

        $reviews = array();

        if ($rows) {
            foreach ($rows as $row) {
                $reviews[] = new Review(array(
                    'id' => $row['id'],
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
        (:member_id, :recipe_id, :username, CURRENT_TIMESTAMP, :message) RETURNING id');

        $query->execute(array(
            'member_id' => $this->member_id,
            'recipe_id' => $this->recipe_id,
            'username' => $this->username,
            'message' => $this->message));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function destroy() {
        
        $query = DB::connection()->prepare('DELETE FROM Review WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }
    
    public function destroyAllRecipeReviews() {
        $query = DB::connection()->prepare('DELETE FROM Review WHERE recipe_id = :id');
        $query->execute(array('id' => $this->recipe_id));
    }
    
    
    public function validate_name() {
        $errors = array();
        $errors[] = parent::validate_name($this->message, 'Kommentti');
        return $errors;
    }
    
    public function validate_string_length() {
        $errors = array();
        $errors[] = parent::validate_string_length($this->message,'Kommentin', 5);
        
        return $errors;
    }
    
    public function validate_max_string_length() {
        $errors = array();
        $errors[] = parent::validate_max_string_length($this->message, 'Kommentin', 400);
        return $errors;
    }
    
    public function update() {
        $query = DB::connection()->prepare('UPDATE Review SET addtime = :addtime, message = :message WHERE id = :id ');
        $query->execute(array (
            'id' => $this->id,
            'addtime' => $this->addtime,
            'message' => $this->message));
    }
}
