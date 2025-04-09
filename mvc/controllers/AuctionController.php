<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

use App\Models\Auction;
use App\Models\Stamp;
use App\Models\Image;
use App\Models\Pays;
use App\Models\Condition;
use App\Models\Couleur;

class AuctionController {
    public function index()
    {
        $auction = new Auction;
        $selectAuction = $auction->select('id');

        if($selectAuction) {

            $stamp = new Stamp;
            $selectStamp = $stamp->select('titre');

            // var_dump($selectStamp);
            // die();

            return View::render('auction/index', ['enchere'=> $selectAuction, 'stampTitle' => $selectStamp]);
        }
        return View::render('error');
    }

    public function show($data = []) {
        if(isset($data['id']) && $data['id']!=null) {
            $auction = new Auction;
            $selectAuction = $auction->selectId($data['id']);

            if($selectAuction){
                $stamp = new Stamp;
                $selectStamp = $stamp->selectId($selectAuction['timbre_id']);

                if($selectStamp) {

                    $couleurId = $selectStamp['couleur_id'];
                    $paysId = $selectStamp['pays_id'];
                    $conditionId = $selectStamp['condition_id'];

                    $couleur = new Couleur;
                    $selectCouleur = $couleur->selectId($couleurId);
                    $selectCouleur = $selectCouleur['nom'];
    
                    $pays = new Pays;
                    $selectPays = $pays->selectId($paysId);
                    $selectPays = $selectPays['nom'];
    
                    $condition = new Condition;
                    $selectCond = $condition->selectId($conditionId);
                    $selectCond = $selectCond['nom'];
                    var_dump($selectCond);
                    die();

                    $image = new Image;
                    $images = $image->selectbyStampId($selectStamp['id']);
                    // var_dump($images);
                    // die();

                    $mainImage = $images[0];
                    // var_dump($mainImage);
                    // die();

                    return View::render('auction/show', ['enchere' =>$selectAuction,'timbre'=>$selectStamp, 'couleur'=> $selectCouleur, 'pays'=> $selectPays, 'conditions'=> $selectCond, 'images' =>$images, 'mainImage' => $mainImage]);
                }
                return View::render('errors/404');
            }
            return View::render('errors/404');
        }
        return View::render('errors/404');
    }
}