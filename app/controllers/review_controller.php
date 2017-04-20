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
        
        var_dump($review);
        
        $review->save();
            Redirect::to('/recipepage/' . $review->recipe_id, array('message' => 'Kommentti lisätty onnistuneesti!'));


       /* $errors = array_merge($errors, $review->errors());


        if (!$errors) {
            $review->save();
            Redirect::to('/recipepage/' . $recipe->id, array('message' => 'Kommentti lisätty onnistuneesti!'));
            
        } else {
            View::make('recipe/recpiepage.html', array('errors' => $errors, 'attributes' => $attributes));
        } */
    } 
}
