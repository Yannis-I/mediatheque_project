<?php

namespace app\models;

class SerieModel extends MovieModel {

    private array $saisons = [];

    /**
     * Tableau associatif contenant le nombre d'épisodes pour chaque saisons
     * @return array["num_saison" => "nbr_episodes"]
     */
    public function getSaisons():array{
        return $this->saisons;
    }
    public function getNbrSaisons():int{
        return count($this->saisons);
    }
    public function getNbrEpisodes(int $numSaison):int{
        return $this->saisons[$numSaison];
    }
    public function getNbrEpisodesTotal():int{
        $nbrTotal = 0;
        foreach($this->saisons as $saison){
            $nbrTotal += $saison['nbr_episodes'];
        }
        return $nbrTotal;
    }
    /**
     * Prend en paramètre un tableau associatif contenant le nombre d'épisodes pour chaque saisons
     * @param array $saisons["num_saison" => "nbr_episodes"]
     * @return self
     */
    public function setSaisons(array $saisons):self{
        $this->saisons = $saisons;
        return $this;
    }
    /**
     * Rajoute une saison au tableau des saisons
     * @param int $num_saison
     * @param mixed $nbr_episodes
     * @return self
     */
    public function addSaison(int $num_saison, $nbr_episodes):self{
        $saison = ["num_saison" => $num_saison, "nbr_episodes" => $nbr_episodes];
        array_push($this->saisons, $saison);
        return $this;
    }
}

?>