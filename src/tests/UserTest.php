<?php

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

  public function test_return_full_name(){
    
    $user = new User;

    $user->firstName = 'John';
    $user->lastName =  'Doe';

    $result = $user->getFullName();

    $this->assertSame('John Doe', $result);

  }
}