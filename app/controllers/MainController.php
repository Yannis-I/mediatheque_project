<?php
namespace app\controllers;

class MainController extends Controller{
    
    public function index()
    {
        $this->render('home/index', [], 'home');
    }
}