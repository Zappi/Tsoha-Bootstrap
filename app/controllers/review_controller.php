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
    
    public static function delete($recipeid, $reviewid) {
        self::check_logged_in();
        $review = new Review(array('id' => $reviewid));
        $review->destroy();
        
        Redirect::to('/recipepage/' . $recipeid);
    }
    
    public static function edit($id) {
        $review = Review::find($id);
        View::make('reviewedit.html', array('attributes' => $review));
    }
    
    public static function update($id, $reviewid) {
        self::check_logged_in();
        $params = $_POST;
        
        $attributes = array( 
            'id' => $id,
            'message' => $params['message']
        );
        
        $review = new Review($attributes);
        $review->id = $reviewid;
        $review->update();
        
        
        $errors = $review->errors();
        
        if(count($errors) > 0) {
            View::make('reviewedit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            Redirect::to('/recipepage/' . $id, array('message' => 'Kommenttia muokattu onnistuneesti!'));
        }
    }
}
