<?php
namespace app\models\beans;

class HumanModel {
    private int $id;
    private string $nom;
    private string $prenom;
    private string $bio;
    private string $url_photo;

    public function getId():int{
        return $this->id;
    }
    public function setId($id):self{
        $this->id = $id;
        return $this;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function setNom($nom):self{
        $this->nom = $nom;
        return $this;
    }
    public function getPrenom():string{
        return $this->prenom;
    }
    public function setPrenom($prenom):self{
        $this->prenom = $prenom;
        return $this;
    }
    public function getBio():string{
        return $this->bio;
    }
    public function setBio(string $bio):self{
        $this->bio = $bio;
        return $this;
    }
    public function getUrl_photo():string{
        return $this->url_photo;
    }
    public function setUrl_photo(string $url_photo):self{
        $this->url_photo = $url_photo;
        return $this;
    }
}

?>