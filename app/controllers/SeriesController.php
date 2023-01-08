<?php
namespace app\controllers;

use app\dao\SeriesDAO;
use app\dao\ActeursDAO;
use app\dao\DirectorsDAO;

class SeriesController extends Controller{
    
    public function index()
    {
        $dao = new SeriesDAO;
        $listSeries = $dao->findAll();

        $datas = [];

        foreach($listSeries as $serie){
            $acteursDao = new ActeursDAO;
            $acteurs = $acteursDao->findByFilmsID($serie->getId());
            
            $realisateurDao = new DirectorsDAO;
            $realisateur = $realisateurDao->findBySeriesID($serie->getId());

            array_push($datas, ["serie" => $serie, "acteurs" => $acteurs, "realisateur" => $realisateur]);
        }

        $this->render('series/index', compact("datas"), 'default');
    }

    public function details($id){
        $seriesDao = new SeriesDAO;
        $movie = $seriesDao->findById($id);
        
        $acteursDao = new ActeursDAO;
        $acteurs = $acteursDao->findBySeriesID($movie->getId());
        
        $realisateurDao = new DirectorsDAO;
        $realisateur = $realisateurDao->findBySeriesID($movie->getId())[0];
        
        $this->render('series/details', compact("movie", "realisateur", "acteurs"), 'default');
    }
}