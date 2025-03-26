<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController {

    // public function __construct(){
    //     Auth::session();
    //     // Auth::privilege(1);
    // }

    public function create(){
        $privilege = new Privilege;
        $select = $privilege->select();
        return View::render('user/create', ['privileges' => $select]);
    }

    public function store($data = []) {
        $validator = new Validator;
        $validator->field('nom', $data['nom'])->min(2)->max(255);
        $validator->field('username', $data['username'])->min(6)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('email', $data['email'])->email()->max(255);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('zipCode', $data['zipCode'], 'Zip Code')->max(10);

        if($validator->isSuccess()) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if($insert) {
                return View::redirect('login');
            }
            else {
                return View::render('error');
            }
        }
        else {
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $select = $privilege->select();
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges'=>$select]);
        }
    }
}