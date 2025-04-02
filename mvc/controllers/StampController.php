<?php
namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Couleur;
use App\Models\Pays;
use App\Models\Condition;
use App\Providers\Validator;
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
        if(isset($data['id']) && $data['id']!=null) {
            $stamp = new Stamp;
            $selectId = $stamp->selectId($data['id']);
            if($selectId) {
                $couleur = new Couleur;
                $selectCouleur = $couleur->select();
                $pays = new Pays;
                $selectPays = $pays->select();
                $condition = new Condition;
                $selectCond = $condition->select();

                return View::render('stamp/show', ['timbre'=>$selectId, 'couleur'=> $selectCouleur, 'pays'=> $selectPays, 'conditions'=> $selectCond]);
            }
            else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function store($data = []) {

        $validator = new Validator;
        $couleur = new Couleur;
        $selectCouleur = $couleur->select();
        $pays = new Pays;
        $selectPays = $pays->select();
        $condition = new Condition;
        $selectCond = $condition->select();

        $validator->field('titre', $data['titre'])->min(2)->max(150);
		$validator->field('date', $data['date'])->required();
        $validator->field('tirage', $data['tirage'])->number();
		$validator->field('longueur', $data['longueur'])->required()->number();
		$validator->field('largeur', $data['largeur'])->required()->number();
		$validator->field('pays_id', $data['pays_id'], 'pays')->required();
		$validator->field('condition_id', $data['condition_id'], 'conditions')->required();
        $validator->field('couleur_id', $data['couleur_id'], 'couleur')->required();


        if ($validator->isSuccess()) {

            $stamp = new Stamp;
            $insert = $stamp->insert($data);

            //sauvegarde des images

            // foreach($_FILE as $nom => $file) {
            //     if($file['error'] == 0) {
            //         $file = $_SERVER["DOCUMENT_ROOT"] . UPLOAD . basename($fichier["name"]);
            //         $move = move_uploaded_file($file["tmp_name"], $file);

            //         $dataImg['image'] = basename($fichier["name"]);
			// 		$dataImg['id'] = $insert;

            //         if ($nom == 'mainImage') {
			// 			$dataImg['principalite'] = 1;
			// 		} else {
			// 			$dataImg['principalite'] = 0;
			// 		}

            //         $image = new Image();
            //         $insertImg = $image->insert($dataImg);

            //     }
            // }

            // return View::redirect('stamp/show?id=' . $insert);

            if ($insert) {
                return View::redirect('image/create?id='.$insert);
            }

        }
        else {
            $errors = $validator->getErrors();
            return View::render('stamp/create', ['errors' => $errors, 'timbre' => $data, 'couleur' => $selectCouleur, 'conditions' => $selectCond, 'pays' => $selectPays]);
        }
    }
}
