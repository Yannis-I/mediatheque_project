<?php
namespace app\controllers;

use app\dao\ActeursDAO;
use app\dao\DirectorsDAO;
use app\dao\FilmsDAO;

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
        $film = $filmsDao->findById($id);
        
        $acteursDao = new ActeursDAO;
        $acteurs = $acteursDao->findByFilmsID($film->getId());
        
        $realisateurDao = new DirectorsDAO;
        $realisateur = $realisateurDao->findByFilmsID($film->getId());
        
        $this->render('films/details', compact("film", "realisateur", "acteurs"), 'default');
    }
}