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
    public function create() {
        $stamp = new Stamp;
        $select = $stamp->select($data);

        return View::render('auction/create', ['timbre' => $select]);
    }

    public function store($data = []) {
        $validator = new Validator;

        $stamp = new Stamp;
        $select = $stamp->select();
        
    }
}