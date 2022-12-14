<?php
namespace app\models;

class FilmModel extends MovieModel /*implements InterfaceDao*/{
    private string $duree;
    public function getDuree():string{
        return $this->duree;
    }
    public function setDuree($duree):void{
        $this->duree = $duree;
    }
}
?>