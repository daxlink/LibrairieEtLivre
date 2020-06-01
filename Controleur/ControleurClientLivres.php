<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Livre.php';
require_once 'Modele/UtilisateurDemande.php';

class ControleurClientLivres extends Controleur {

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
    
    public function ajouter() {
        $isbnLivre = $this->requete->getParametreId("id");
        $this->genererVue(['isbnLivre' => $isbnLivre]);
    }
    
    public function nouvelleUtilisateurDemande() {
        $utilisateurDemande['utilisateur_id'] = $this->requete->getParametre('utilisateur_id');
        $utilisateurDemande['livre_isbn'] = $this->requete->getParametre('livre_isbn');
        $utilisateurDemande['date_location'] = $this->requete->getParametre('date_location');
        $utilisateurDemande['details'] = $this->requete->getParametre('details');
        $this->utilisateurDemande->setUtilisateurDemande($utilisateurDemande);
        $this->executerAction('index');
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