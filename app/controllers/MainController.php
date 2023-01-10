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
        $listFilms = $filmsDao->findRandom(3);

        $seriesDao = new SeriesDAO;
        $listSeries = $seriesDao->findRandom(3);

        $acteursDao = new ActeursDAO;
        $listActeurs = $acteursDao->findRandom(3);

        $realisateurDao = new DirectorsDAO;
        $listRealisateurs = $realisateurDao->findRandom(3);

        $datas = [$listFilms, $listSeries, $listActeurs, $listRealisateurs];

        $this->render('home/index', compact("datas"), 'default');
    }
}