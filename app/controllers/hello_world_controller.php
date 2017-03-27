<?php

  class HelloWorldController extends BaseController{

      public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      echo 'Tämä on etusivu. Jeejee';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä

    }
      
    public static function home() {
        View::make('index.html');
    }
    
    public static function categorylisting() {
        View::make('categories.html');
    }  
    
    public static function addrecipe() {
        View::make('addreceipe.html');
    }  
      
    public static function recipepage() {
        View::make('receipepage.html');
    }
      
    public static function login() {
        View::make('login.html');
    }
      
    public static function register() {
        View::make('register.html');
    } 
  }
