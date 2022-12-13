<?php
namespace app\controllers;

class SeriesController extends Controller{
    
    public function index()
    {
        $this->render('series/index', [], 'default');
    }
}