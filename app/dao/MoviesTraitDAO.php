<?php

namespace app\dao;

Trait MoviesTraitDAO {
    private function findByHumanId(string $sql, int $humanId):array{
        $resultListMoviesId = $this->requete($sql, [$humanId])->fetchAll();

        $listMovies = [];
        foreach($resultListMoviesId as $tabMoviesId){
            array_push($listMovies, $this->findByID($tabMoviesId["id"]));
        }
        return $listMovies;
    }
}