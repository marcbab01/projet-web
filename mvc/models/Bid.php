<?php
namespace App\Models;

use App\Models\CRUD;

class Bid extends CRUD
{
    protected $table      = "mise";
    protected $primaryKey = "id";
    protected $fillable   = ['montant', 'timestamp', 'user_id', 'enchere_id'];

    public function selectbyAuctionId($AuctionId) {
        $sql = "SELECT * FROM $this->table WHERE `enchere_id` = ?;";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($AuctionId));

        $rows = $stmt->rowCount();

        if ($rows > 0) {
            return $stmt->fetchAll();
        }
        else {
            return false;
        }
    }
}