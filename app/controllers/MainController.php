<?php
namespace app\controllers;

use app\models\dao\ActeursDAO;
use app\models\dao\DirectorsDAO;
use app\models\dao\FilmsDAO;
use app\models\dao\SeriesDAO;

class MainController extends Controller{
    
    public function index()
    {
        $filmsDao = new FilmsDAO;
        $listFilms = $filmsDao->findRandom(4);

        $seriesDao = new SeriesDAO;
        $listSeries = $seriesDao->findRandom(4);

        $acteursDao = new ActeursDAO;
        $listActeurs = $acteursDao->findRandom(4);

        $realisateurDao = new DirectorsDAO;
        $listRealisateurs = $realisateurDao->findRandom(4);

        $datas = [$listFilms, $listSeries, $listActeurs, $listRealisateurs];

        $this->render('home/index', compact("datas"), 'default');
    }
}