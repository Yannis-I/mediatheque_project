<?php

namespace app\dao;

use app\models\SerieModel;

class SeriesDAO extends MoviesDAO {
    use MoviesTraitDAO;

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

    //TODO: Jointure sur la table Series_Saisons
    public function findByActorId(int $actorID): array{
        $requeteListFilmsId = "SELECT Acteurs_Movies.id_movie FROM Acteurs_Movies WHERE id_acteur = ?;";

        return $this->findByHumanId($actorID, $requeteListFilmsId);
    }

    //TODO: Jointure sur la table Series_Saisons
    public function findByDirectorId(int $directorID): array{
        $requeteListFilmsId = "SELECT Movies.id_movie FROM Movies WHERE id_director = ?;";

        return $this->findByHumanId($directorID, $requeteListFilmsId);
    }
}
