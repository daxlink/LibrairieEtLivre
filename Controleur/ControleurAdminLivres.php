<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Livre.php';
require_once 'Modele/UtilisateurDemande.php';

class ControleurAdminLivres extends Controleur {

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
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }
    
    public function nouveauLivre() {
        $livre['isbn'] = $this->requete->getParametre('isbn');
        $livre['titre'] = $this->requete->getParametre('titre');
        $livre['annéePublication'] = $this->requete->getParametre('annéePublication');
        $this->livre->setLivre($livre);
        $this->executerAction('index');
    }
    
    public function modifier() {
        $isbnLivre = $this->requete->getParametreId('id');
        $livre = $this->livre->getLivre($isbnLivre);
        $vue = new Vue("Modifer");
        $this->genererVue(['livre' => $livre]);
    }
    
    public function MaJ() {
        $livre['isbn'] = $this->requete->getParametre('isbn');
        $livre['titre'] = $this->requete->getParametre('titre');
        $livre['annéePublication'] = $this->requete->getParametre('annéePublication');
        $this->livre->updateLivre($livre);
        $this->executerAction('index');
    }
    
    public function supprimerLivre() {
        $isbnLivre = $this->requete->getParametreId('id');
        $livre = $this->livre->getLivre($isbnLivre);
        $vue = new Vue("SupprimerLivre");
        $this->genererVue(['livre' => $livre]);
    }
    
    public function confirmerLivre() {
        $isbnLivre = $this->requete->getParametre('isbn');
        $this->livre->deleteLivre($isbnLivre);
        $this->executerAction('index');
    }
    
    public function supprimerUtilisateurDemande() {
        $id = $this->requete->getParametreId('id');
        $utilisateurDemande = $this->utilisateurDemande->getUtilisateurDemande($id);
        $vue = new Vue("SupprimerUtilisateurDemande");
        $this->genererVue(['utilisateurDemande' => $utilisateurDemande]);
    }
    
    public function confirmerUtilisateurDemande() {
        $id = $this->requete->getParametreId('id');
        $this->utilisateurDemande->deleteUtilisateurDemande($id);
        $this->executerAction('index');
    }
}