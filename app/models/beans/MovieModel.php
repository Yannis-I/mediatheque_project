<?php
namespace app\models\beans;

abstract class MovieModel {
    protected int $id;
    protected string $titre;
    protected int $annee;
    protected string $synopsis;
    protected string $url_affiche;
    protected int $id_director;
    protected array $acteurs = [];

    public function getId():int {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getTitre(): string
    {
        return $this->titre;
    }
    public function setTitre(string $titre): self{
        $this->titre = $titre;
        return $this;
    }
    public function getIdDirector(): int {
        return $this->id_director;
    }
    public function setIdDirector(int $id_director): self {
        $this->id_director = $id_director;
        return $this;
    }
    public function getAnnee(): int{
        return $this->annee;
    }
    public function setAnnee(int $annee): self{
        $this->annee = $annee;
        return $this;
    }
    public function getSynopsis(): string{
        return $this->synopsis;
    }
    public function setSynopsis(string $synopsis): self{
        $this->synopsis = $synopsis;
        return $this;
    }
    public function getUrl_affiche():string{
        return $this->url_affiche;
    }
    public function setUrl_affiche(string $url_affiche): self{
        $this->url_affiche = $url_affiche;
        return $this;
    }
    /**
     * Renvoie un tableau à 2 dimensions
     * @return array
     */
    public function getActeursID():array{
        return $this->acteurs;
    }
    /**
     * Prend un tableau à 2dim
     * @param array $acteurs
     * @return self
     */
    public function setActeursID(array $acteurs): self{
        $this->acteurs = $acteurs;
        return $this;
    }
    /**
     * Rajoute l'Objet ActeurModel et son personnage dans le tableau des acteurs
     * @param HumanModel $acteur
     * @param string $personnage
     * @return self
     */
    public function addActeur(int $acteur_id, string $personnage):self{
        $acteurTab = ["acteur" => $acteur_id, "personnage" => $personnage];
        array_push($this->acteurs, $acteurTab);
        return $this;
    }

    /**
     * Fonction qui renvoie le nom du personnage en fonction de l'id de l'acteur
     * @param int $acteurID
     * @return string
     */
    public function getPersonnage(int $acteurID):string{
        foreach($this->acteurs as $acteur){
            if($acteur["acteur"] == $acteurID){
                return $acteur["personnage"];
            }
        }
        return false;
    }
}
?>