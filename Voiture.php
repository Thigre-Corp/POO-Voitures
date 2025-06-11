<?php

class Voiture{
    //--attributs:
    private  string $_marque ="";
    private  string $_modele ="";
    private  int $_nbPortes = 0;
    private int $_vitesseActuelle = 0;
    private bool $_estDemarre = FALSE;
    private int $_vhIndex = 0;
    private static int $_vhNum =0;

    //--contrstructeur
    public function __construct(string $marque, string $modele, int $nbPortes){
        $this->_marque = $marque;
        $this->_modele = $modele;
        $this->_nbPortes = $nbPortes;
        $this->_vhIndex = ++self::$_vhNum;
        $this->_vitesseActuelle = 0;
        $this->_estDemarre = FALSE;
    }

    //--toString
    public function __toString(){
        return $this->_marque." ".$this->_modele;
    }
    //--setter
    public function setMarque(string $marque ="") : string {
        return $this->_marque = $marque;
    }
    public function setModele(string $modele) : string {
        return $this->_modele = $modele;
    }
    public function setNbPortes(int $nbPortes = 0) : int {
        return $this->_nbPortes = $nbPortes;
    }
    public function setVitesse(int $vitesseActuelle = 0) : int {
        return $this->_vitesseActuelle = $vitesseActuelle;
    }
    public function setEstDemarre(bool $estDemarre = FALSE) : bool{
        return $this->_estDemarre = $estDemarre;
    }
    //---getter
    public function getMarque() : string{
        return $this->_marque;
    }
    public function getModele() : string {
        return $this->_modele;
    }
    public function getNbPortes() : int {
        return $this->_nbPortes;
    }
    public function getVitesse() : int {
        return $this->_vitesseActuelle;
    }
    public function getEstDemarre(): bool {
        return $this->_estDemarre;
    }
    public function vhIndex() : int {
        return $this->_vhNum;
    }
    //--méthodes
    public function marqueModele() : string {
        return "Le vehicule ".$this->_marque." ".$this->_modele." ";
    }
    public function demarrer() : string {
        if(!$this->_estDemarre){
              $this->_estDemarre = TRUE;
            return $this->marqueModele()."démarre<br>";
        }
        else{
            return $this->marqueModele()."est déjà démarré<br>";
        }
    }
    public function accelerer(int $vitesse) : string {
        if($this->_estDemarre){
            $this->_vitesseActuelle += $vitesse;
            return $this->marqueModele()."accélére de $vitesse km/h<br>";
        }
        else{
            return $this->marqueModele()."veut accélérer de $vitesse : Pour accélérer, il faut d'abord démarrer!!!<br>";
        }
    }
    public function stopper() : string {
        if($this->_estDemarre){
            $this->_estDemarre = FALSE;
            $this->_vitesseActuelle = 0;
            return $this->marqueModele()."est stoppé<br>";
        }
        else{
            return $this->marqueModele()."est déjà stoppé<br>";
        }
    }
    public function ralentir(int $vitesse)  : string {
        $temp_string = $this->marqueModele()."veut ralentir de $vitesse km/h : ";
        if($this->_estDemarre && ($this->_vitesseActuelle != 0)){
            $this->_vitesseActuelle -= $vitesse;
            if($this->_vitesseActuelle <0){
                $vitesse += $this->_vitesseActuelle;
                $this->_vitesseActuelle = 0;
            }
            return $temp_string."il ralenti de $vitesse km/h".(!$this->_vitesseActuelle ? " et s'arrête" : "")."<br>" ;
        }
        else{
            return $temp_string."pour ralentir, il faut déjà rouler!!!<br>";
        }
    }
    public function ficheInfo()  : string {
        return 
        "<br>Infos véhicule ".$this->_vhIndex."<br>
        **********************<br>
        Nom et modèle du véhicule : ".$this->_marque." ".$this->_modele."<br>
        Nombre de portes : ".$this->_nbPortes."<br>
        Le véhicule ".$this->_marque.(($this->_estDemarre) ? " est démarré" : " est stoppé")."<br>
        Sa vitesse actuelle est de : ".$this->_vitesseActuelle."<br>";
    }
}