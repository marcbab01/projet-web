<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Auction;
use App\Models\Bid;
use App\Providers\Validator;
use App\Providers\View;

class BidController {

    public function placeBid($data) {
        $validator = new Validator;

        $validator->field('montant', $data['montant'])->number();
        
        if($validator->isSuccess()) {
            $bid = new Bid;
            $insertBid = $bid->insert($data);
            // var_dump($data);
            // die();
            
            if($insertBid) {
                return View::render('auction/show', );
            }
        }
    }
}