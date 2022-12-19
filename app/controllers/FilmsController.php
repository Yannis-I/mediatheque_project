<?php
namespace app\controllers;

use app\dao\FilmsDAO;

class FilmsController extends Controller{
    
    public function index()
    {
        $dao = new FilmsDAO;
        $listFilms = $dao->findAll();

        $this->render('films/index', compact("listFilms"), 'default');
    }

    public function details($id){
        $dao = new FilmsDAO;
        $film = $dao->findById($id);
        
        $this->render('films/details', compact("film"), 'default');
    }
}