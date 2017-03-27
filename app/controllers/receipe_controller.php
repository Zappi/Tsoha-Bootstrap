<?php

class ReceipeController extends BaseController{

 public static function index() {
     
     $receipes = Receipe::all();

     View::make('receipe/index.html', array('receipes' => $receipes));
 }

}