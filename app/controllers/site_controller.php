<?php

class SiteController extends BaseController{
    
    public static function home() {
        View::make('index.html');
    }
    
}
