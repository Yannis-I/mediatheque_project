<?php

namespace app\dao;

Trait MoviesTraitDAO {
    private function findByHumanId(int $humanId, string $sql):array{
        $resultListFilmsId = $this->requete($sql, [$humanId])->fetchAll();

        $listFilms = [];
        foreach($resultListFilmsId as $tabFilmsId){
            array_push($listFilms, $this->findByID($tabFilmsId["id_movie"]));
        }
        return $listFilms;
    }
}