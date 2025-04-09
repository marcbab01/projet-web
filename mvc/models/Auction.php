<?php
namespace App\Models;

use App\Models\CRUD;

class Auction extends CRUD
{
    protected $table      = "enchere";
    protected $primaryKey = "id";
    protected $fillable   = ['debut', 'fin', 'prix_plancher', 'timbre_id'];
}