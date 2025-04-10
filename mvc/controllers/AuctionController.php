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
use App\Models\Bid;
use App\Models\User;

class AuctionController {
    public function index()
    {
        $auction = new Auction;
        $selectAuction = $auction->select();



        foreach($selectAuction as $selectAuctionIndex=>$auction) {
            $stamp = new Stamp;
            $selectStamps = $stamp->selectId($auction['timbre_id']);
            $selectAuction[$selectAuctionIndex]['timbre'] = $selectStamps;

            $couleurId = $selectStamps['couleur_id'];
            $paysId = $selectStamps['pays_id'];
            $conditionId = $selectStamps['condition_id'];

            $couleur = new Couleur;
            $selectCouleur = $couleur->selectId($couleurId);
            $selectCouleur = $selectCouleur['nom'];

            $pays = new Pays;
            $selectPays = $pays->selectId($paysId);
            $selectPays = $selectPays['nom'];
            $selectAuction[$selectAuctionIndex]['timbre']['pays'] = $selectPays;

            $condition = new Condition;
            $selectCond = $condition->selectId($conditionId);
            $selectCond = $selectCond['nom'];
            $selectAuction[$selectAuctionIndex]['timbre']['condition'] = $selectCond;

            $image = new Image;
            $images = $image->selectbyStampId($selectStamps['id']);
            $mainImage = $images[0];
            $selectAuction[$selectAuctionIndex]['timbre']['image'] = $mainImage;


        }
        // echo('<pre>');
        // print_r($selectAuction);
        // echo('</pre>');
        // die();

        return View::render('auction/index', ['enchere'=> $selectAuction]);
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
                    // var_dump($selectCond);
                    // die();

                    $image = new Image;
                    $images = $image->selectbyStampId($selectStamp['id']);

                    $mainImage = $images[0];

                    $mise = new Bid;
                    $mises = $mise->selectByAuctionId($selectAuction['id']);

                    foreach($mises as $selectMiseIndex=>$mise) {
                        $user = new User;
                        $users = $user->selectId($mise['user_id']);
                        $mises[$selectMiseIndex]['user'] = $users['username'];
                    }


                    return View::render('auction/show', ['enchere' =>$selectAuction,'timbre'=>$selectStamp, 'couleur'=> $selectCouleur, 'pays'=> $selectPays, 'conditions'=> $selectCond, 'images' =>$images, 'mainImage' => $mainImage, 'mises' => $mises]);
                }
                return View::render('errors/404');
            }
            return View::render('errors/404');
        }
        return View::render('errors/404');
    }
}