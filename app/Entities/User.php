<?php

namespace App\Entities;


// Entity is basically how the data looks instead of returning array it will return an object of "structure" of the data
class User extends \CodeIgniter\Entity\Entity
{
 public function verifyPassword($password) {
     return password_verify($password, $this->password_hashed);
 }
}