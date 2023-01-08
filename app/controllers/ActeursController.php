<?php
namespace app\controllers;

use app\dao\ActeursDAO;
use app\dao\FilmsDAO;
use app\dao\SeriesDAO;

class ActeursController extends Controller{
    
    public function index()
    {
        $acteursDAO = new ActeursDAO;
        $datas = $acteursDAO->findAll();

        $this->render('acteurs/index', compact("datas"), 'default');
    }

    public function details($id){
        $acteursDAO = new ActeursDAO;
        $acteur = $acteursDAO->findById($id);

        $filmDAO = new FilmsDAO;
        $listFilms = $filmDAO->findByActorId($id);

        $seriesDAO = new SeriesDAO;
        $listSeries = $seriesDAO->findByActorId($id);

        $datas = [$acteur, $listFilms, $listSeries];

        $this->render('acteurs/details', compact("datas"), 'default');
    }
}