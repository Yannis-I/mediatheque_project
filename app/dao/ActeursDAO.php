<?php
namespace app\dao;

use app\models\ActeurModel;

final class ActeursDAO extends HumansDAO{
    use HumansTraitDAO;
    public function __construct(){
        $this->role = "ACTOR";
    }

    public function findAll():array{
        // On récupère tous les acteurs
        return $this->findAllHuman();
    }

    public function findById(int $id): ActeurModel{
        return $this->findHumanById($id);
    }

    public function findByFilmsID(int $id): array{
        $requete = "SELECT Acteurs_Movies.id_acteur as id FROM Acteurs_Movies LEFT JOIN Films ON Acteurs_Movies.id_acteur = Films.id WHERE Acteurs_Movies.id_movie = ?;";
        return $this->findByMoviesId($requete, $id);
    }

    public function findBySeriesID(int $id): array{
        $requete = "SELECT Acteurs_Movies.id_acteur as id FROM Acteurs_Movies LEFT JOIN Series_Saisons ON Acteurs_Movies.id = Series_Saisons.id WHERE Movies.id = ?;";
        return $this->findByMoviesId($requete, $id);
    }
}