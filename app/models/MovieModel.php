<?php
namespace app\models;

abstract class MovieModel extends ModelDAO{
    protected int $id;
    protected string $titre;
    protected int $annee;
    protected string $synopsis;
    protected string $url_affiche;
    protected array $acteurs = [];

    public function getId():int {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getTitre(): string
    {
        return $this->titre;
    }
    public function setTitre(string $titre): void{
        $this->titre = $titre;
    }
    public function getAnnee(): int{
        return $this->annee;
    }
    public function setAnnee(int $annee): void{
        $this->annee = $annee;
    }
    public function getSynopsis(): string{
        return $this->synopsis;
    }
    public function setSynopsis(string $synopsis): void{
        $this->synopsis = $synopsis;
    }
    public function getUrl_affiche():string{
        return $this->url_affiche;
    }
    public function setUrl_affiche(string $url_affiche): void{
        $this->url_affiche = $url_affiche;
    }
    /**
     * Renvoie un tableau à 2 dimensions
     * @return array
     */
    public function getActeurs():array{
        return $this->acteurs;
    }
    /**
     * Prend un tableau à 2dim
     * @param array $acteurs
     * @return void
     */
    public function setActeurs(array $acteurs): void{
        $this->acteurs = $acteurs;
    }
    /**
     * Rajoute l'Objet ActeurModel et son personnage dans le tableau des acteurs
     * @param ActeurModel $acteur
     * @param string $personnage
     * @return void
     */
    public function addActeur(ActeurModel $acteur, string $personnage):void{
        $acteurTab = ["acteur" => $acteur, "personnage" => $personnage];
        array_push($this->acteurs, $acteurTab);
    }
}
?>