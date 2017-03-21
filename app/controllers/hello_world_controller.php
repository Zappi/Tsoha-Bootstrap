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
        View::make('index.html');
    }
    
    public static function kategorialistaus() {
        View::make('categories.html');
    }  
    
    public static function reseptinlisays() {
        View::make('addreceipe.html');
    }  
      
    public static function reseptisivu() {
        View::make('receipepage.html');
    }
      
    public static function login() {
        View::make('login.html');
    }
      
    public static function register() {
        View::make('register.html');
    } 
      
    public static function addreceipe() {
        View::make('addreceipe.html');
    }  
  }
