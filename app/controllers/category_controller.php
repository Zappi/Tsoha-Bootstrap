<?php

class CategoryController extends BaseController{
    
     public static function findAll() {

        $categories = Category::all();

        View::make('/recipe/addrecipe.html', array('categories' => $categories));
    }
    
    public static function findAllForCategoryPage() {
        
        $categories = Category::all();
        View::make('categories/categories.html', array('categories' =>  $categories));
    }
}
