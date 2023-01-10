<?php

namespace app\models\dao;

use app\models\beans\FilmModel;

final class FilmsDAO extends MoviesDAO
{
    use MoviesTraitDAO;
    use RandomTraitDAO;

    public function __construct(){
        $this->table = "Films";
    }

    /**
     * Lister tous les films
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

    public function findByActorId(int $actorID): array{
        $requeteListFilmsId = "SELECT Acteurs_Movies.id_movie AS id FROM Acteurs_Movies RIGHT JOIN Films ON Acteurs_Movies.id_movie = Films.id WHERE Acteurs_Movies.id_acteur = ? GROUP BY Acteurs_Movies.id_movie;";

        return $this->findByHumanId($requeteListFilmsId, $actorID);
    }

    public function findByDirectorId(int $directorID): array{
        $requeteListFilmsId = "SELECT Movies.id AS id FROM Movies RIGHT JOIN Films ON Movies.id = Films.id WHERE id_director = ? GROUP BY Movies.id;";

        return $this->findByHumanId($requeteListFilmsId, $directorID);
    }
}
