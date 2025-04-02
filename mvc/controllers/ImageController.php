<?php
namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Image;
use App\Providers\View;

class ImageController {
    public function index() {
        $image = new Image;
        $select = $image->select('image');
        if($select) {
            return View::render('image/index', ['image'=> $select]);
        }
        return View::render('error');
    }

    public function create() {
        $timbre = new Stamp;
        $select = $timbre->select();

        View::render('image/create', ['timbre'=> $select]);
    }

    public function show($data = []) {
        if(isset($data['id']) && $data['id']!=null){
            $image = new Image;
            $selectId = $image->selectId($data['id']);
            if($selectId) {
                return View::render('image/show', ['image'=>$selectId]);
            }
            else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function store() {
        $stamp = new Stamp;

        $image = new Image;
        $insert = $image->insert();

        $directory = "uploads/";
        $file = $directory . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strlower(pathinfo($file, PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "Le fichier est une image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            else {
                echo "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }
        }

        // Si le fichier exite déjà
        if (file_exists($file)) {
            echo "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }

        // Taille de l'image
        if ($_FILE["fileToUpload"]["size"] > 500000) {
            echo "L'image est trop grande.";
            $uploadOk = 0;
        }
    }
}