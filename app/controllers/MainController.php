<?php
namespace app\controllers;

use app\models\dao\FilmsDAO;

class MainController extends Controller{
    
    public function index()
    {
        $filmsDao = new FilmsDAO;
        $listFilms = $filmsDao->findAll();

        $this->render('home/index', [], 'default');
    }
}