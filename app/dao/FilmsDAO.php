<?php

namespace app\dao;

use app\models\FilmModel;

class FilmsDAO extends MoviesDAO
{
    use MoviesTraitDAO;

    public function __construct(){
        $this->table = "Films";
    }

    /**
     * Lister tout les films
     * @return array FilmModel
     */
    public function findAll():array{
        // On récupère tout les films
        $listFilms = $this->findAllMovies();

        //On va chercher la durée des films
        //On créer la requête
        $requeteDuree = "SELECT Films.duree FROM Films WHERE id = ?";

        foreach($listFilms as $film){
            $result = $this->requete($requeteDuree, [$film->getId()])->fetch();
            $film->setDuree($result['duree']);
        }
        return $listFilms;
    }

    public function findByID(int $id): FilmModel{
        // On récupère le film
        $film = (object)$this->findMoviesById($id);
        
        // On récupère la durée du film correspondant à l'id dans la base de données
        // On prépare la requête
        $requeteFilm = "SELECT Films.duree FROM Films WHERE Films.id = ?;";

        // On éxécute la requête  pour lister les films
        $resultFilm = $this->requete($requeteFilm, [$id])->fetch();
        $film->setDuree($resultFilm['duree']);

        return $film;
    }

    //TODO: Jointure sur la table Films
    public function findByActorId(int $actorID): array{
        $requeteListFilmsId = "SELECT Acteurs_Movies.id_movie FROM Acteurs_Movies WHERE id_acteur = ?;";

        return $this->findByHumanId($actorID, $requeteListFilmsId);
    }

    //TODO: Jointure sur la table Films
    public function findByDirectorId(int $directorID): array{
        $requeteListFilmsId = "SELECT Movies.id_movie FROM Movies WHERE id_director = ?;";

        return $this->findByHumanId($directorID, $requeteListFilmsId);
    }
}
