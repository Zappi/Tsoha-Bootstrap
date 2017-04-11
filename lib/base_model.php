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

    public function validate_name($name) {
        $errors = array();

        if($name == null) {
            return $name . " ei voi olla tyhjä";
        }

        if(strlen($name) < 3) {
            $errors[] =  $name . ' tulee olla vähintään 3 merkkiä pitkä!';
            return $errors;
        }
        
        
        
        return null;
    }
    

  }
