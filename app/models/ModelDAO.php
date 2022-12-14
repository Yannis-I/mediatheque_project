<?php

namespace app\models;

use core\Db;

class ModelDAO extends Db
{
    // Instance de Db
    private $db;

    public function __construct(){}


    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if ($attributs !== null) {
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // Requête simple
            return $this->db->query($sql);
        }
    }

    /**
     * Lister tout les films
     * @return array FilmModel
     */
    public function findAllFilms():array{
        // On récupère la liste de tout les films dans la base de données
        // On prépare les requêtes 
        $requeteFilms = "SELECT Movies.id, Movies.titre, Movies.annee, Movies.url_affiche, Films.duree, Movies.synopsis FROM Movies RIGHT JOIN Films ON Movies.id = Films.id;";
        $requeteActeurs = "SELECT Acteurs.id, Acteurs.nom, Acteurs.prenom, Acteurs.url_photo, Acteurs_Movies.personnage FROM Acteurs_Movies LEFT JOIN Acteurs ON Acteurs_Movies.id_acteur = Acteurs.id WHERE Acteurs_Movies.id_movie=?;";
        
        // On éxécute la requête  pour lister les films
        $resultFilms = $this->requete($requeteFilms)->fetchAll();

        //On initialise un tableau de films
        $listFilms = [];
        
        // On instancie les filmModels
        foreach($resultFilms as $filmsTab){
            $film = new FilmModel;
            $film->setId($filmsTab["id"]);
            $film->setTitre($filmsTab["titre"]);
            $film->setAnnee($filmsTab["annee"]);
            $film->setUrl_affiche($filmsTab["url_affiche"]);
            $film->setDuree($filmsTab["duree"]);
            $film->setSynopsis($filmsTab["synopsis"]);

            $resultActeurs = $this->requete($requeteActeurs, [$film->id])->fetchAll();
            foreach($resultActeurs as $acteurTab){
                $acteur = new ActeurModel;
                $acteur->setId($acteurTab["id"]);
                $acteur->setNom($acteurTab["nom"]);
                $acteur->setPrenom($acteurTab["prenom"]);
                $acteur->setUrl_photo($acteurTab["url_photo"]);

                $film->addActeur($acteur, $acteurTab["personnage"]);
            }

            array_push($listFilms, $film);
        }
        return $listFilms;
    }
}
