<?php
namespace App\Controllers;

class Mahasiswa extends BaseController {
    public function index(){
        echo "pbw";
    }
    public function ucapan(){
        $data["n"]=$this->request->getGet("nama"); //bisaganti post menjadi getPost
        echo view("hello",$data);
        //return view("hello");
    }
}