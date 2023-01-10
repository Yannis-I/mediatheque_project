<?php
namespace app\models\dao;

use app\models\beans\DirectorModel;

final class DirectorsDAO extends HumansDAO{
    use HumansTraitDAO;
    use RandomTraitDAO;

    public function __construct(){
        $this->role = "DIRECTOR";
        $this->table = "Movies";
    }

    public function findAll():array{
        // On récupère tous les directeurs
        return $this->findAllHuman();
    }

    public function findById(int $id): DirectorModel{
        return $this->findHumanById($id);
    }

    public function findByFilmsID(int $id): array{
        $requete = "SELECT Movies.id_director as id FROM Movies LEFT JOIN Films ON Movies.id = Films.id WHERE Movies.id = ?;";
        
        return $this->findByMoviesId($requete, $id);
    }

    public function findBySeriesID(int $id): array{
        $requete = "SELECT Movies.id_director as id FROM Movies LEFT JOIN Series_Saisons ON Movies.id = Series_Saisons.id WHERE Movies.id = ?;";
        return $this->findByMoviesId($requete, $id);
    }
}