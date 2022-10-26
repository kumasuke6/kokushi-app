<?php

namespace App;

class User{
  
  public $firstName;
  
  public $lastName;

  public function getFullName(){

    return $this->firstName.' '.$this->lastName;

  }

}