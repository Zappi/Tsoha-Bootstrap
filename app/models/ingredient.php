<?php

class Ingredient extends BaseModel {

    public $id, $name, $amount;

    public function __constructor($attributes) {
        parent::__constructor($attributes);
    }

    
}