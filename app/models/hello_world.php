<?php
require 'app/models/recipe.php';
  class HelloWorld extends BaseModel{

    public static function say_hi(){
      return 'Hello World!';
    }
  }
