<?php

namespace app\models\dao;

use app\models\beans\SerieModel;

final class SeriesDAO extends MoviesDAO {
    use MoviesTraitDAO;
    use RandomTraitDAO;

    public function __construct(){
        $this->table = "Series_Saisons";
    }

    /**
     * Lister toutes les séries
     * @return array FilmModel
     */
    public function findAll():array{
        // On récupère tout les films
        $listSeries = $this->findAllMovies();

        //On va chercher les saisons des séries
        //On créer la requête
        $requeteSaisons = "SELECT numero_saison, nbr_episodes FROM Series_Saisons WHERE id = ?";

        foreach($listSeries as $serie){
            $results = $this->requete($requeteSaisons, [$serie->getId()])->fetchAll();

            foreach ($results as $result) {
                $serie->addSaison($result['numero_saison'], $result['nbr_episodes']);
            }
        }
        return $listSeries;
    }

    public function findByID(int $id): SerieModel{
        // On récupère tout les films
        $serie = (object)$this->findMoviesById($id);

        //On va chercher les saisons de la série
        //On créer la requête
        $requeteSaisons = "SELECT numero_saison, nbr_episodes FROM Series_Saisons WHERE id = ?";

        $results = $this->requete($requeteSaisons, [$serie->getId()])->fetchAll();

        // on rajoute les saisons à la série
        foreach ($results as $result) {
            $serie->addSaison($result['numero_saison'], $result['nbr_episodes']);
        }
        return $serie;
    }

    public function findByActorId(int $actorID): array{
        $requeteListSeriesId = "SELECT Acteurs_Movies.id_movie AS id FROM Acteurs_Movies RIGHT JOIN Series_Saisons ON Acteurs_Movies.id_movie = Series_Saisons.id WHERE id_acteur = ? GROUP BY Series_Saisons.id;";

        return $this->findByHumanId($requeteListSeriesId, $actorID);
    }

    public function findByDirectorId(int $directorID): array{
        $requeteListSeriesId = "SELECT Movies.id FROM Movies RIGHT JOIN Series_Saisons ON Movies.id = Series_Saisons.id WHERE Movies.id_director = ? GROUP BY Series_Saisons.id;";

        return $this->findByHumanId($requeteListSeriesId, $directorID);
    }
}