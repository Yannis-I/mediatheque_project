<?php

namespace app\dao;

abstract class HumansDAO extends DAO implements InterfaceDAO{
    protected string $role;

    protected function findAllHuman(): array {
        // On récupère les humains qui sont dans Human dans la base de données
        // On prépare la requête
        $requeteHuman = "SELECT Human.id, Human.nom, Human.prenom, Human.bio, Human.url_photo FROM Human";
        
        // On éxécute la requête
        $resultHumans = parent::requete($requeteHuman)->fetchAll();
        
        //On initialise un tableau d'humains
        $listHumans = [];

        // On instancie les objets
        foreach($resultHumans as $humanTab){
            $instance = (object)$this->createHumans($humanTab);
            array_push($listHumans, $instance);
        }
        
        return $listHumans;
    }

    protected function findHumanById(int $id): object{
        // On récupère l'humain qui est dans Human dans la base de données
        // On prépare la requête
        $requeteHuman = "SELECT Human.id, Human.nom, Human.prenom, Human.bio, Human.url_photo FROM Human WHERE id = ?";
        
        // On éxécute la requête
        $resultHuman = parent::requete($requeteHuman, [$id])->fetch();
        
        // On instancie l'objet
        $instance = (object)$this->createHumans($resultHuman);
        
        return $instance;
    }

    public function writeDB(object $object): int {
        $requeteInsertHuman = "INSERT INTO Human (nom, prenom, bio, url_photo) VALUES (?, ?, ?, ?);";
        $requeteId = "SELECT last_insert_id();";

        $listAttributs = [$object->getNom(), $object->getPrenom(), $object->getBio(), $object->getUrl_photo()];

        $this->requete($requeteInsertHuman, $listAttributs);
        $id = $this->requete($requeteId)->fetch();

        return $id['id'];
    }

    public function updateDB(object $object): void {
        $requeteUpdate = "UPDATE Human SET nom = ?, prenom = ?, bio = ?, url_photo = ? WHERE id = ?;";
        $listAttributs = [$object->getNom(), $object->getPrenom(), $object->getBio(), $object->getUrl_photo(), $object->getId()];

        $this->requete($requeteUpdate, $listAttributs)->fetch();
    }

    public function deleteDB(int $id) :void{
        $requeteUpdateMovies = "UPDATE Movies SET id_director = null WHERE id_director = ?;";
        $requeteDeleteActeur = "DELETE FROM Acteurs_Movies WHERE id_acteur = ?;";
        $requeteDeleteHuman = "DELETE FROM Human WHERE id = ?;";

        $this->requete($requeteUpdateMovies, [$id])->fetch();
        $this->requete($requeteDeleteActeur, [$id])->fetch();
        $this->requete($requeteDeleteHuman, [$id])->fetch();
    }

    private function createHumans(array $params):object{
        
        if($this->role == "ACTOR"){
            $object = "app\models\ActeurModel";
        }else if($this->role == "DIRECTOR"){
            $object = "app\models\DirectorModel";
        }

        $instance = new $object;
        $instance->setId($params['id']);
        $instance->setNom($params['nom']);
        $instance->setPrenom(['prenom']);
        $instance->setBio(['bio']);
        $instance->setUrl_photo(['url_photo']);

        return $instance;
    }
}