<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
          $errors = array_merge($errors, $this->{$validator}());
      }

      return array_filter($errors);
    }

    public function validate_name($name, $varName) {
        $error = null;

        if($name == null) {
            $error = $varName . " ei voi olla tyhjä";
        }
        return $error;
    }
    
    public function validate_string_length($name, $varName, $length) {
        $error = null;
        
        if(strlen($name) < $length) {
            $error = $varName . ' pituuden tulee olla vähintään ' . $length . ' merkkiä pitkä.';
        }
        return $error;
    }
    

  }
