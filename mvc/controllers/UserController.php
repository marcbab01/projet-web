<?php

namespace App\Controllers;
use App\Controllers\User;

class UserController {
    public function index() {
        $user = new User;
        $select = $user->select('name');
        if($select){
            return View::render('user/index', ['user'=> $select]);
        }
        return View::render('error');
    }
}