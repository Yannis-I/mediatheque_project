<?php
namespace app\controllers;

class SeriesController extends Controller{
    
    public function index()
    {
        $this->render('series/index', [], 'default');
    }

    public function details($id){
        $this->render('series/details', [], 'default');
    }
}