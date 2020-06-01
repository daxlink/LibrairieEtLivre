<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Livre.php';
require_once 'Modele/UtilisateurDemande.php';

class ControleurLivres extends Controleur {

    private $livre;
    private $utilisateurDemande;
    
    public function __construct() {
        $this->livre = new Livre();
        $this->utilisateurDemande = new UtilisateurDemande();
    }
    
    public function index() {
        $livres = $this->livre->getLivres();
        $this->genererVue(['livres' => $livres]);
    }
    
    public function lire() {
        $isbnLivre = $this->requete->getParametreId("id");
        $livre = $this->livre->getLivre($isbnLivre);
        $utilisateurDemandes = $this->utilisateurDemande->getUtilisateurDemandes($isbnLivre);
        $this->genererVue(['livre' => $livre, 'utilisateurDemandes' => $utilisateurDemandes]);
    }
    
}