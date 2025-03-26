<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

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

    public function create() {
        $privilege = new Privilege;
        $privileges = $privilege->select('privilege');
        return View::render('user/create', ['privileges'=>$privileges]);
    }

    public function store($data = []) {
        $validator = new Validator;
        $validator->field('nom', $data['nom'])->min(2)->max(255);
        $validator->field('username', $data['username'])->min(6)->max(50);
        $validator->field('password', $data['password']);
        $validator->field('email', $data['email'])->email()->max(255);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('zipCode', $data['zipCode'], 'Zip Code')->max(10);

        if($validator->isSuccess()) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($date);
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
            $privileges = $privilege->select('privilege');
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges'=>$privileges]);
        }
    }
}