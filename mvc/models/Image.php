<?php
namespace App\Models;

use App\Models\CRUD;

class Image extends CRUD
{
    protected $table      = "image";
    protected $primaryKey = "id";
    protected $fillable   = ['image', 'principalite', 'timbre_id'];
}
