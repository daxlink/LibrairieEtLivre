<?php

require_once 'Framework/Modele.php';

class utilisateurDemande extends Modele {
    
    public function getUtilisateurDemandes ($isbnLivre = NULL) {
        if ($isbnLivre == NULL) {
            $sql = 'SELECT ud.id, '
                    . 'ud.utilisateur_id, '
                    . 'ud.livre_isbn, '
                    . 'ud.date_demande, '
                    . 'ud.date_location, '
                    . 'ud.details, '
                    . 'u.prénom, '
                    . 'u.nom, '
                    . 'l.titre '
                    . 'FROM utilisateurDemandes ud '
                    . 'LEFT JOIN utilisateurs u '
                    . 'ON ud.utilisateur_id = u.id '
                    . 'LEFT JOIN livres l '
                    . 'ON l.isbn = ud.livre_isbn '
                    . 'ORDER BY l.titre ASC, ud.date_demande ASC';
        } else {
            $sql = 'SELECT ud.id, '
                    . 'ud.utilisateur_id, '
                    . 'ud.livre_isbn, '
                    . 'ud.date_demande, '
                    . 'ud.date_location, '
                    . 'ud.details, '
                    . 'u.prénom, '
                    . 'u.nom '
                    . 'FROM utilisateurDemandes ud '
                    . 'INNER JOIN utilisateurs u '
                    . 'ON ud.utilisateur_id = u.id '
                    . 'WHERE ud.livre_isbn = ? '
                    . 'ORDER BY ud.date_demande ASC';
        }
        $utilisateurDemande = $this->executerRequete($sql, [$isbnLivre]);
        return $utilisateurDemande;
    }
    
    public function setUtilisateurDemande ($utilisateurDemande) {
        $sql = 'INSERT INTO utilisateurDemandes ('
                . 'utilisateur_id, '
                . 'livre_isbn, '
                . 'date_demande, '
                . 'date_location, '
                . 'details) '
                . 'VALUES (?, ?, now(), ?, ?)';
        $result = $this->executerRequete($sql, [
            $utilisateurDemande['utilisateur_id'], 
            $utilisateurDemande['livre_isbn'], 
            
            $utilisateurDemande['date_location'], 
            $utilisateurDemande['details']
                ]
        );
        return $result;
    }
    
    public function getUtilisateurDemande ($id) {
        $sql = 'SELECT * '
                . 'FROM utilisateurDemandes '
                . 'where id=?';
        $utilisateurDemande = $this->executerRequete($sql, [$id]);
        if ($utilisateurDemande->rowCount() == 1) {
            return $utilisateurDemande->fetch();
        } else {
            throw new Exception("Aucune Demande ne correspond à l'identifiant '$id'");
        }
    }
    
    public function deleteUtilisateurDemande($id) {
        $sql = 'DELETE FROM utilisateurDemandes WHERE id =?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }
    
}