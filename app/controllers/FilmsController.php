<?php
namespace app\controllers;

use app\models\ModelDAO;

class FilmsController extends Controller{
    
    public function index()
    {
        $dao = new ModelDAO;
        $listFilms = $dao->findAllFilms();

        $this->render('films/index', compact("listFilms"), 'default');
    }
}