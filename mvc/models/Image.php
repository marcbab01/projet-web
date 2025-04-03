<?php
namespace App\Models;

use App\Models\CRUD;

class Image extends CRUD
{
    protected $table      = "image";
    protected $primaryKey = "id";
    protected $fillable   = ['chemin', 'principalite', 'timbre_id'];

    final public function mainImage($value) {
        $sql = "SELECT * FROM $this->table WHERE `id` = ? AND `principalite` = 1;";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($value));

        $rows = $stmt->rowCount();

        if ($rows == 1) {
            return $stmt->fetch();
        }
        else {
            return false;
        }
    }
}
