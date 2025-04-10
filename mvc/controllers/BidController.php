<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Auction;
use App\Models\Bid;
use App\Providers\Validator;
use App\Providers\View;
use App\Providers\Auth;

class BidController {

    public function placeBid($data) {

        Auth::session();

        
        $validator = new Validator;

        $validator->field('montant', $data['montant'])->number();
        $data['user_id'] = $_SESSION['user_id'];



        if($validator->isSuccess()) {
            $bid = new Bid;
            $insertBid = $bid->insert($data);

            // echo('<pre>');
            // print_r($insertBid);
            // echo('</pre>');
            // die();

            if($insertBid) {
                return View::redirect('auction/show'.'?id='.$data['enchere_id']);
            }
        }
    }
}