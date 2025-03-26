<?php
class HomeController {
    public function index() {
        $data = "Hello from ExampleModel!";
        include('views/home.php');
    }
}