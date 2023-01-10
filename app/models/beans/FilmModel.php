<?php
namespace app\models\beans;

class FilmModel extends MovieModel {
    private string $duree;
    public function getDuree():string{
        $dureeFormat = substr(str_replace(":", "h", substr($this->duree, 0, -3)), 1);
        return $dureeFormat;
        // return $this->duree;
    }
    public function setDuree($duree):self{
        $this->duree = $duree;
        return $this;
    }
}
?>