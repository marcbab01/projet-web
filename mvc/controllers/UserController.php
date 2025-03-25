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

    public function show($data = []) {
        if(asset($data['id']) && $data['id']!=null) {
            $user = new User;
            $selectId = $user->selectId($data['id']);
            if($selectId) {
                return View::render('user/show', ['user'=>$selectId]);
            }
            else {
                return View::render('error');
            }
        }
        return View::render('error');
    }
}