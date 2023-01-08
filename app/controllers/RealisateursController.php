<?php
namespace app\controllers;

use app\dao\DirectorsDAO;
use app\dao\FilmsDAO;
use app\dao\SeriesDAO;

class RealisateursController extends Controller{
    
    public function index()
    {
        $realisateurDAO = new DirectorsDAO;
        $datas = $realisateurDAO->findAll();

        $this->render('realisateurs/index', compact("datas"), 'default');
    }

    public function details($id){
        
        $realisateurDAO = new DirectorsDAO;
        $realisateur = $realisateurDAO->findById($id);

        $filmDAO = new FilmsDAO;
        $listFilms = $filmDAO->findByDirectorId($id);

        $seriesDAO = new SeriesDAO;
        $listSeries = $seriesDAO->findByDirectorId($id);

        $datas = [$realisateur, $listFilms, $listSeries];

        $this->render('realisateurs/details', compact("datas"), 'default');
    }
}