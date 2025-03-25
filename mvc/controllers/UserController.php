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

    public function create() {
        View:render('user/create');
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
            $insert = $client->insert($date);
            if($insert) {
                return View::redirect('user/show?id='.$insert);
            }
            else {
                return View::render('error');
            }
        }
        else {
            $errors = $validator->getErrors();
            $inputs = $data;
            return View::render('user/create', ['errors'=>$errors, 'inputs'=>$inputs]);
        }
    }
}