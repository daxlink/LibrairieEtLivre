<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/UtilisateurDemande.php';

class ControleurAdminUtilisateurDemandes extends Controleur {
    
    private $utilisateurDemande;
    
    public function __construct() {
        $this->utilisateurDemande = new utilisateurDemande();
    }
    
    public function index() {
        $utilisateurDemandes = $this->utilisateurDemande->getUtilisateurDemandes();
        $this->genererVue(['utilisateurDemandes' => $utilisateurDemandes]);
    }
    
    public function supprimer() {
        $id = $this->requete->getParametreId('id');
        $utilisateurDemande = $this->utilisateurDemande->getUtilisateurDemande($id);
        $vue = new Vue("Supprimer");
        $this->genererVue(['utilisateurDemande' => $utilisateurDemande]);
    }
    
    public function confirmer() {
        $id = $this->requete->getParametreId('id');
        $this->utilisateurDemande->deleteUtilisateurDemande($id);
        $this->executerAction('index');
    }
    
}