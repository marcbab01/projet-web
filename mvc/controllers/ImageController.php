<?php
namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Image;
use App\Providers\View;

class ImageController {
    public function index() {
        $image = new Image;
        $select = $image->select('image');
        if($select) {
            return View::render('image/index', ['image'=> $select]);
        }
        return View::render('error');
    }

    public function create() {
        $timbre = new Timbre;
        $select = $timbre->select();

        View::render('image/create', ['timbre'=> $select]);
    }

    public function show($data = []) {
        if(isset($data['id']) && $data['id']!=null){
            $image = new Image;
            $selectId = $image->selectId($data['id']);
            if($selectId) {
                return View::render('image/show', ['image'=>$selectId]);
            }
            else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function store() {
        $image = new Image;
        $insert = $image->insert($data);
        if($insert) {
            return View::redirect('image/show^id='.$insert);
        }
        else {
            return View::render('error');
        }
    }
}