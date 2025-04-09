<?php
namespace App\Models;

use App\Models\CRUD;

class Bid extends CRUD
{
    protected $table      = "mise";
    protected $primaryKey = "id";
    protected $fillable   = ['montant', 'timestamp', 'user_id', 'enchere_id'];
}