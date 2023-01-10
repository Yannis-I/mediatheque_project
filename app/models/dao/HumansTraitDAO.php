<?php

namespace app\models\dao;

Trait HumansTraitDAO {
    private function findByMoviesId(string $sql, int $humanId):array{
        $listHumans = [];

        $results = $this->requete($sql, [$humanId])->fetchAll();

        foreach($results as $humanTab){
            array_push($listHumans, $this->findById($humanTab['id']));
        }
        return $listHumans;
    }
}