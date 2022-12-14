<?php
namespace app\models;

class ActeurModel extends ModelDAO /*implements InterfaceDao*/{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $url_photo;

    public function getId():int{
        return $this->id;
    }
    public function setId($id):void{
        $this->id = $id;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function setNom($nom):void{
        $this->nom = $nom;
    }
    public function getPrenom():string{
        return $this->prenom;
    }
    public function setPrenom($prenom):void{
        $this->prenom = $prenom;
    }
    public function getUrl_photo():string{
        return $this->url_photo;
    }
    public function setUrl_photo(string $url_photo):void{
        $this->url_photo = $url_photo;
    }
}

?>