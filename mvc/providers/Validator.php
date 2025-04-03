<?php

namespace App\Providers;
use App\Models;

class Validator {

    private $errors = array();
    private $key;
    private $value;
    private $name;

    public function field($key, $value, $name = null) {
        $this->key = $key;
        $this->value = $value;
        if($name == null) {
            $this->name = ucfirst($key);
        }
        else {
            $this->name = ucfirst($name);
        }
        return $this;
    }

    public function required() {
        if (empty($this->value)) {
            $this->errors[$this->key]="$this->name est requis.";
        }
        return $this;
    }

    public function max($length) {
        if(strlen($this->value) > $length) {
            $this->errors[$this->key]="$this->name doit avoir un maximum de $length caractères.";
        }
        return $this;
    }

    public function min($length) {
        if(strlen($this->value) < $length) {
            $this->errors[$this->key]="$this->name doit avoir un minimum de $length caractères.";
        }
        return $this;
    }

    public function number() {
        if(!empty($this->value) && !is_numeric($this->value)) {
            $this->errors[$this->key]="$this->name doit être un nombre.";
        }
        return $this;
    }

    public function int() {
        if(!filter_var($this->value, FILTER_VALIDATE_INT)) {
            $this->errors[$this->key]="$this->name doit être un interger.";
        }
        return $this;
    }

    public function float() {
        if(!filter_var($this->value, FILTER_VALIDATE_FLOAT)){
            $this->errors[$this->key]="$this->name doit être une décimale.";
        } 
        return $this;
    }

    public function bigger($limit) {
        if ($this->value >= $limit) {
            $this->errors[$this->key]="$this->name doit être égal ou inférieur à $limit.";
        }
        return $this;
    }

    public function lower($limit) {
        if ($this->value <= $limit) {
            $this->errors[$this->key]="$this->name doit égal ou supérieur à $limit.";
        }
        return $this;
    }

    public function email() {
        if (!empty($this->value) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->key]="$this->name est un format invalide.";
        }
        return $this;
    }

    public function validateDate($format = 'Y-m-d' ) {
        $date = \DateTime::createFromFormat($format, $this->value);
        if (!$date || $date->format($format) !== $this->value) {
            $this->errors[$this->key]="$this->name format invalide. Utilisez le format $format.";
        }
        return $this; 
    }

    public function validImg($name) {
        if ($_FILES["mainImage"]["error"] !=4) {
            if ($this->value[$name]["error"] > 0) {
                $this->errors[$this->key]="Il y a eu une erreur avec votre image";
            }
            return $this;

            $directory = $_SERVER["DOCUMENT_ROOT"] . UPLOAD;
            $target_file = $directory . basename($_FILES["$name"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $verif = getimagesize($_FILES[$name]["tmp_name"]);
            if($verif == false) {
                $this->errors[$this->key]="Le format de l'image est invalide";
            }

            if ($_FILES[$name]["size"] > 200000) {
                $this->errors[$this->key]="L'image est trop lourde";
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                $this->errors[$this->key]="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            return $this;
        }
    }

    public function image($name) {
        if ($_FILES[$name]["error"] == 4) {
            $this->errors[$this->key]="Une image est requise";
        }
        return $this;
    }

    public function isSuccess(){
        if(empty($this->errors)) return true;
    }

    public function getErrors(){
        if(!$this->isSuccess()) return $this->errors;
    }

    public function unique($model) {
        $model = 'App\\Models\\'.$model;
        $model = new $model;
        $unique = $model->unique($this->key, $this->value);
        if ($unique) {
            $this->errors[$this->key]="$this->name existe déjà.";
        }
        return $this; 
    }
}