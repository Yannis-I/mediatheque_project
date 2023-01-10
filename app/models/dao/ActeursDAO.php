<?php
namespace app\models\dao;

use app\models\beans\ActeurModel;

final class ActeursDAO extends HumansDAO{
    use HumansTraitDAO;
    use RandomTraitDAO;
    public function __construct(){
        $this->role = "ACTOR";
        $this->table = "Acteurs_Movies";
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
        $requete = "SELECT Acteurs_Movies.id_acteur as id FROM Acteurs_Movies LEFT JOIN Series_Saisons ON Acteurs_Movies.id_movie = Series_Saisons.id WHERE Series_Saisons.id = ? GROUP BY Acteurs_Movies.id_acteur;";
        return $this->findByMoviesId($requete, $id);
    }
}