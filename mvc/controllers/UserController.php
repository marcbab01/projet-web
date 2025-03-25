<?php

namespace App\Controllers;
use App\Controllers\User;

class UserController {
    public function index() {
        $user = new User;
        $select = $user->select('name');
        include('views/user/index.php');
    }
}