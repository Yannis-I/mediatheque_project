<?php
namespace app\models\dao;
trait RandomTraitDAO {
    public function findRandom(int $nbrObject):array {
        if($this->table == "Movies"){
            $column = "id_director";
        }else if($this->table == "Acteurs_Movies"){
            $column = "id_acteur";
        } else {
            $column = "id";
        }
        $requete = "SELECT " . $this->table . "." . $column . " AS id FROM " . $this->table . " GROUP BY " . $this->table . "." . $column . " ORDER BY RAND() LIMIT " . $nbrObject . ";";
        
        $resultRequete = $this->requete($requete, [])->fetchAll();

        $resultList = [];
        
        foreach($resultRequete as $id){
            array_push($resultList, $this->findByID($id["id"]));
        }
        return $resultList;
    }
}