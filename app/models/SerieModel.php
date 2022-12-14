<?php

namespace app\models;

class SerieModel extends MovieModel /*implements InterfaceDao*/{

    private array $saisons;

    /**
     * Tableau associatif contenant le nombre d'épisodes pour chaque saisons
     * @return array["num_saison" => "nbr_episodes"]
     */
    public function getSaisons():array{
        return $this->saisons;
    }
    /**
     * Prend en paramètre un tableau associatif contenant le nombre d'épisodes pour chaque saisons
     * @param array $saisons["num_saison" => "nbr_episodes"]
     * @return void
     */
    public function setSaisons(array $saisons):void{
        $this->saisons = $saisons;
    }
    /**
     * Rajoute une saison au tableau des saisons
     * @param int $num_saison
     * @param mixed $nbr_saison
     * @return void
     */
    public function addSaison(int $num_saison, $nbr_saison):void{
        $saison = ["num_saison" => $num_saison, "nbr_saison" => $nbr_saison];
        array_push($this->saisons, $saison);
    }
}

?>