<?php


class ReviewController extends BaseController {
    
    public static function store($id) {
        self::check_logged_in();
        $params = $_POST;
        $errors = array();
        

        $attributes = array(
            'member_id' => self::get_user_logged_in()->id,
            'recipe_id' => $id,
            'username' => self::get_user_logged_in()->username,
            'message' => $params['message']

        );
        $review = new Review($attributes);
        
        $errors = $review->errors();
        
        if(count($errors) == 0) {
            $review->save();
            Redirect::to('/recipepage/' . $id, array('message' => 'Kommentti lisätty onnistuneesti.'));
        } else {
            Redirect::to('/recipepage/' . $id, array('errors' => $errors));
        }
    } 
}
