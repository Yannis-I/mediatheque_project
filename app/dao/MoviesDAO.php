<?php

namespace app\dao;

abstract class MoviesDAO extends DAO implements InterfaceDAO {
    protected string $table;

    protected function findAllMovies(): array {
        // On récupère la liste de toutes les movies qui sont dans films dans la base de données
        // On prépare la requêtes 
        $requeteFilms = "SELECT Movies.id, Movies.titre, Movies.id_director, Movies.annee, Movies.url_affiche, Movies.synopsis 
                         FROM Movies RIGHT JOIN " . $this->table 
                         ." ON Movies.id = " . $this->table . ".id;";
        
        // On éxécute la requête  pour lister les films
        $resultFilms = parent::requete($requeteFilms)->fetchAll();

        //On initialise un tableau de films
        $listMovies = [];
        
        // On instancie les filmModels ou serieModels
        foreach($resultFilms as $movieTab){
            $instance = (object)$this->createMovies($movieTab);

            array_push($listMovies, $instance);
        }
        return $listMovies;
    }

    protected function findMoviesById(int $id): object{
        // On prépare la requêtes 
        $requeteMovie = "SELECT Movies.id, Movies.titre, Movies.id_director, Movies.annee, Movies.url_affiche, Movies.synopsis 
                         FROM Movies RIGHT JOIN " . $this->table 
                         ." ON Movies.id = " . $this->table . ".id
                         WHERE Movies.id = ?;";
        
        // On éxécute la requête
        $resultMovie = parent::requete($requeteMovie, [$id])->fetch();
        
        // On instancie filmModel  ou serieModels
        $instance = (object)$this->createMovies([$resultMovie]);

        return $instance;
    }

    public function writeDB(object $object): int {
        $requeteInsertMovies = "INSERT INTO Movies (titre, id_director, annee, synopsis, url_affiche) Values (?, ?, ?, ?, ?);";
        $requeteSelectId = "SELECT last_insert_id();";
        $requeteInsertActor = "INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (?, ?, ?);";

        $this->requete($requeteInsertMovies, [$object->getTitre(), $object->getIdDirector(), $object->getAnnee(), $object->getSynopsis(), $object->getUrl_affiche()])->fetch();
        $resultMovieId = $this->requete($requeteSelectId)->fetch();

        foreach($object->getActeursID() as $actor){
            $this->requete($requeteInsertActor, [$resultMovieId["id"], $actor["acteur"], $actor["personnage"]])->fetch();
        }

        if($this->table == "Films"){
            $requeteInsertFilm = "INSERT INTO Films (id, duree) Values (?, ?);";
            $this->requete($requeteInsertFilm, [$resultMovieId["id"], $object->getDuree()])->fetch();
        }
        else if($this->table == "Series_Saisons"){
            $requeteInsertSaison = "INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (?, ?, ?);";
            
            foreach($object->getSaisons() as $numSaison => $nbrSaison){
                $this->requete($requeteInsertSaison, [$resultMovieId["id"], $numSaison, $nbrSaison])->fetch();
            }
        }

        return $resultMovieId;
    }

    public function updateDB(object $object): void {
        $requeteUpdateMovie = "UPDATE Movies SET titre = ?, id_director = ?, annee = ?, synopsis = ?, url_affiche = ? WHERE id = ?;";

        $this->requete($requeteUpdateMovie, [$object->getTitre(), $object->getIdDirector(), $object->getAnnee(), $object->getSynopsis(), $object->getUrl_affiche(), $object->getId()])->fetch();

        if ($this->table == "Films") {
            $requeteUpdateFilm = "UPDATE Films SET duree = ? WHERE id = ?;";
            $this->requete($requeteUpdateFilm, [$object->getDuree(), $object->getId()])->fetch();
        }
        else if ($this->table == "Series_Saisons"){
            $requeteCheckSaison = "SELECT Count(*) FROM Series_Saisons WHERE id = ? AND numero_saison = ?;";
            
            foreach ($object->getSaisons() as $numSaison => $nbrEpisodes) {
                $resultCheck = $this->requete($requeteCheckSaison, [$object->getId(), $numSaison])->fetch();

                if($resultCheck["COUNT(*)"] > 0){
                    $requeteUpdateSerie = "UPDATE Series_Saisons SET nbr_episodes = ? WHERE id = ?;";
                    $this->requete($requeteUpdateSerie, [$nbrEpisodes, $object->getId()])->fetch();
                }else{
                    $requeteInsertSerie = "INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) VALUES (?, ?, ?);";
                    $this->requete($requeteInsertSerie, [$object->getId(), $numSaison, $nbrEpisodes])->fetch();
                }
            }
        }

        $requeteCheckActor = "SELECT COUNT(*) FROM Acteurs_Movies WHERE id_acteur = ? AND id_movie = ?;";

        foreach($object->getActeursID() as $actor){
            $resultCheck = $this->requete($requeteCheckActor, [$actor['acteur'], $object->getId()])->fetch();

            if($resultCheck["COUNT(*)"] > 0) {
                $requeteUpdatePerso = "UPDATE Acteurs_Movies SET personnage = ? WHERE id_acteur = ? AND id_movie = ?;";
                $this->requete($requeteUpdatePerso, [$actor['acteur'], $object->getId()])->fetch();
            } else {
                $requeteInsertPerso = "INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) VALUES (?, ?, ?);";
                $this->requete($requeteInsertPerso, [$object->getId(), $actor['acteur'], $actor['personnage']])->fetch();
            }
        }
    }

    public function deleteDB(int $id) :void{
        $requetePersonnage = "DELETE FROM Acteurs_Movies WHERE id_movie = ?;";

        if ($this->table == "Films") {
            $requeteTypeObj = "DELETE FROM Films WHERE id = ?;";
        }
        else if ($this->table == "Series_Saisons"){
            $requeteTypeObj = "DELETE FROM Series_Saisons WHERE id = ?;";
        }

        $requeteMovie = "DELETE FROM Movies WHERE id = ?;";

        $requetes = [$requetePersonnage, $requeteTypeObj, $requeteMovie];

        foreach($requetes as $requete){
            $this->requete($requete, [$id])->fetch();
        }
    }

    /**
     * Créer l'objet à instancier et lui passe les paramètres du tableau
     * @param string $object
     * @return void
     */
    private function createMovies(array $params):object{
        $requeteActeurs = "SELECT Human.id, Acteurs_Movies.personnage 
                            FROM Acteurs_Movies 
                            LEFT JOIN Human 
                            ON Acteurs_Movies.id_acteur = Human.id 
                            WHERE Acteurs_Movies.id_movie=?;";

        if($this->table == "Films"){
            $object = "app\models\FilmModel";
        }else if($this->table == "Series_Saisons"){
            $object = "app\models\SerieModel";
        }

        $instance = new $object;
        $instance->setId($params["id"]);
        $instance->setTitre($params["titre"]);
        $instance->setAnnee($params["annee"]);
        $instance->setUrl_affiche($params["url_affiche"]);
        $instance->setSynopsis($params["synopsis"]);
        $instance->setIdDirector($params["id_director"]);

        $resultActeurs = $this->requete($requeteActeurs, [$instance->getId()])->fetchAll();
        foreach($resultActeurs as $acteurTab){
            $instance->addActeur($acteurTab["id"], $acteurTab["personnage"]);
        }
        return $instance;
    }
}

?>