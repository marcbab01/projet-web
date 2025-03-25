<?php

namespace App\Controllers;
use App\Controllers\User;

class UserController {
    public function index() {
        $model = new User();
        $data = $model->getData();
    }
}