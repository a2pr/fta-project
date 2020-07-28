<?php

namespace App\Controller\Registration;

use App\Entity\Users;
use DateTime;

class CreateUser
{

    public function __construct()
    {
    }

    public function createNewUser(Users $user): Users
    {
        $user->setPassword($this->setPassword($user->getPassword()));
        $user->setDtc(new DateTime());
        return $user;
    }

    private function setPassword($pass){
        $hash= md5($pass);
        return $hash;
    }
}