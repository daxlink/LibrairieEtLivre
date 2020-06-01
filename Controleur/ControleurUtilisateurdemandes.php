<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/UtilisateurDemande.php';

class ControleurUtilisateurDemandes extends Controleur {
    
    private $utilisateurDemande;
    
    public function __construct() {
        $this->utilisateurDemande = new utilisateurDemande();
    }
    
    public function index() {
        $utilisateurDemandes = $this->utilisateurDemande->getUtilisateurDemandes();
        $this->genererVue(['utilisateurDemandes' => $utilisateurDemandes]);
    }
    
}