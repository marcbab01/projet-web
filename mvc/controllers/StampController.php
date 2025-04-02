<?php
namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Couleur;
use App\Models\Pays;
use App\Models\Condition;
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

    public function create() {
        $couleur = new Couleur;
        $selectCouleur = $couleur->select();
        $pays = new Pays;
        $selectPays = $pays->select();
        $condition = new Condition;
        $selectCond = $condition->select();

        View::render('stamp/create', ['couleur'=> $selectCouleur, 'pays'=> $selectPays, 'conditions'=> $selectCond]);
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

    public function store($data = []) {
        $stamp = new Stamp;
        $insert = $stamp->insert($data);
        if($insert) {
            return View::redirect('stamp/show^id='.$insert);
        }
        else {
            return View::render('error');
        }
    }
}
