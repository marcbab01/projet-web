<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Couleur;
use App\Models\Pays;
use App\Models\Condition;
use App\Models\Image;
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
                $selectCouleur = $couleur->selectId($selectId['couleur_id']);
                $selectCouleur = $selectCouleur['nom'];

                $pays = new Pays;
                $selectPays = $pays->selectId($selectId['pays_id']);
                $selectPays = $selectPays['nom'];

                $condition = new Condition;
                $selectCond = $condition->selectId($selectId['condition_id']);
                $selectCond = $selectCond['nom'];

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

        if(($_FILES["mainImage"]["error"] > 0) || ($_FILES["mainImage"]["size"] > 0)) {
            $validator->field('mainImage', $_FILES, "Image")->image("mainImg")->validImg("mainImg");
        }
        if(($_FILES["image1"]["error"] == 1) || ($_FILES["image1"]["size"] > 0)) {
            $validator->field('image1', $_FILES, "Image")->validImg("image1");
        }
        if(($_FILES["image2"]["error"] == 1) || ($_FILES["image2"]["size"] > 0)) {
            $validator->field('image2', $_FILES, "Image")->validImg("image2");
        }
        if(($_FILES["image3"]["error"] == 1) || ($_FILES["image3"]["size"] > 0)) {
            $validator->field('image3', $_FILES, "Image")->validImg("image3");
        }

        $validator->field('titre', $data['titre'])->min(2)->max(150);
		$validator->field('date', $data['date'])->required();
        $validator->field('tirage', $data['tirage'])->number();
		$validator->field('longueur', $data['longueur'])->required()->number();
		$validator->field('largeur', $data['largeur'])->required()->number();
		$validator->field('pays_id', $data['pays_id'], 'pays')->required();
		$validator->field('condition_id', $data['condition_id'], 'conditions')->required();
        $validator->field('couleur_id', $data['couleur_id'], 'couleur')->required();


        if ($validator->isSuccess()) {

           // Array ( [titre] => cvxvxcvdss [date] => 2000 [couleur_id] => [pays_id] => 4 [condition_id] => 2 [tirage] => 20 [longueur] => 20 [largeur] => 20 [certificat] => 1 )

            $stamp = new Stamp;
            $insert = $stamp->insert($data);

            $directory = $_SERVER["DOCUMENT_ROOT"] . UPLOAD;
            $target_file = $directory . basename($_FILES[$name]["name"]);

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            foreach ($_FILES as $nom => $file) {
				if ($file['error'] == 0) {
					$fileDir = $_SERVER["DOCUMENT_ROOT"] . UPLOAD . basename($file["name"]);
					$move = move_uploaded_file($file["tmp_name"], $fileDir);

					$dataImg['chemin'] = basename($file["name"]);
					$dataImg['timbre_id'] = $insert;

					$image = new Image();
					$addImg = $image->insert($dataImg);
				}
			}

			return View::redirect('stamp/show?id=' . $insert);

            // if ($insert) {
            //     return View::redirect('image/create?id='.$insert);
            // }

        }
        else {
            $errors = $validator->getErrors();
            return View::render('stamp/create', ['errors' => $errors, 'timbre' => $data, 'couleur' => $selectCouleur, 'conditions' => $selectCond, 'pays' => $selectPays]);
        }
    }

    public function edit($data=[]){
        if(isset($data['id'])&& $data['id']!=null){
            $stamp = new Stamp;
            if($selectId = $stamp->selectId($data['id'])){
                return View::render('stamp/edit', ['timbre'=>$selectId]);
            }else{
                return View::render('error', ['msg'=>'Ce timbre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function update($data=[], $get=[]){
        $validator = new Validator;
        $couleur = new Couleur;
        $selectCouleur = $couleur->select();
        $pays = new Pays;
        $selectPays = $pays->select();
        $condition = new Condition;
        $selectCond = $condition->select();

        if(($_FILES["mainImage"]["error"] > 0) || ($_FILES["mainImage"]["size"] > 0)) {
            $validator->field('mainImage', $_FILES, "Image")->image("mainImg")->validImg("mainImg");
        }
        if(($_FILES["image1"]["error"] == 1) || ($_FILES["image1"]["size"] > 0)) {
            $validator->field('image1', $_FILES, "Image")->validImg("image1");
        }
        if(($_FILES["image2"]["error"] == 1) || ($_FILES["image2"]["size"] > 0)) {
            $validator->field('image2', $_FILES, "Image")->validImg("image2");
        }
        if(($_FILES["image3"]["error"] == 1) || ($_FILES["image3"]["size"] > 0)) {
            $validator->field('image3', $_FILES, "Image")->validImg("image3");
        }

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
            $update = $stamp->update($data, $get['id']); 

            $directory = $_SERVER["DOCUMENT_ROOT"] . UPLOAD;
            $target_file = $directory . basename($_FILES[$name]["name"]);

            if($update) {
                return View::redirect('stamp/show?id=' . $get['id']);
            }
            else {
                return View::render('error');
            }
        }
        else {
            $errors = $validator->getErrors();
            return View::render('stamp/edit', ['errors' => $errors, 'timbre' => $data, 'couleur' => $selectCouleur, 'conditions' => $selectCond, 'pays' => $selectPays]);
        }

    }

    public function delete($data=[]){
        $id = $data['id'];
        $stamp = new Stamp;
        $delete = $stamp->delete($id);
        if($delete){
            return View::redirect('stamp');
        }else{
            return View::render('error');
        }
    }
}
