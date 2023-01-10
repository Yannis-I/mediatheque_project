<?php
namespace app\controllers;

use app\models\dao\ActeursDAO;
use app\models\dao\DirectorsDAO;
use app\models\dao\FilmsDAO;

class FilmsController extends Controller{
    
    public function index()
    {
        $dao = new FilmsDAO;
        $listFilms = $dao->findAll();

        $datas = [];

        foreach($listFilms as $film){
            $acteursDao = new ActeursDAO;
            $acteurs = $acteursDao->findByFilmsID($film->getId());
            
            $realisateurDao = new DirectorsDAO;
            $realisateur = $realisateurDao->findByFilmsID($film->getId());

            array_push($datas, ["film" => $film, "acteurs" => $acteurs, "realisateur" => $realisateur]);
        }

        $this->render('films/index', compact("datas"), 'default');
    }

    public function details($id){
        $filmsDao = new FilmsDAO;
        $movie = $filmsDao->findById($id);
        
        $acteursDao = new ActeursDAO;
        $acteurs = $acteursDao->findByFilmsID($movie->getId());
        
        $realisateurDao = new DirectorsDAO;
        $realisateur = $realisateurDao->findByFilmsID($movie->getId())[0];
        
        $this->render('films/details', compact("movie", "realisateur", "acteurs"), 'default');
    }
}