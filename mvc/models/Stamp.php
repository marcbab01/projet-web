<?php
namespace App\Models;

use App\Models\CRUD;

class Stamp extends CRUD
{
    protected $table      = "timbre";
    protected $primaryKey = "id";
    protected $fillable   = ['date', 'couleur_id', 'pays_id', 'condition_id', 'tirage', 'longueur', 'largeur', 'certificat'];
}
