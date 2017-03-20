<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      echo 'Tämä on etusivu. Jeejee';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
      
    public static function etusivu() {
        View::make('suunnitelmat/etusivu.html');
    }
    
    public static function kategorialistaus() {
        View::make('suunnitelmat/kategorialistaussivu.html');
    }  
    
    public static function reseptinlisays() {
        View::make('suunnitelmat/reseptinlisays.html');
    }  
      
    public static function reseptisivu() {
        View::make('suunnitelmat/reseptisivu.html');
    }
  }
