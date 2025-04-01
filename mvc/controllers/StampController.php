<?php
namespace App\Controllers;

use App\Models\Stamp;
use App\Providers\View;

class StampController
{
    public function index()
    {
        $stamp  = new Stamp;
        $select = $stamp->select('titre');
        if($select) {
            return View::render('stamp/index', ['timbre'=> $select]);
        }
        return View::render('error');
    }

    public function show($data = []) {
        if(isset($data['id']) && $data['id']!=null){
            $stamp = new Stamp;
            $selectId = $stamp->selectId($data['id']);
            if($selectId) {
                return View::render('stamp/show', ['timbre'=>$selectId]);
            }
            else {
                return View::render('error');
            }
        }
        return View::render('error');
    }
}
