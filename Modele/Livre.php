<?php

require_once 'Framework/Modele.php';

class Livre extends Modele {
    
    public function getLivres() {
        $sql = 'SELECT * FROM livres ORDER BY titre ASC';
        $livres = $this->executerRequete($sql);
        return $livres;
    }

    public function setLivre($livre) {
        $sql = 'insert into livres ('
                . 'isbn, '
                . 'titre, '
                . 'annéePublication) '
                . 'values (?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $livre['isbn'], 
            $livre['titre'], 
            $livre['annéePublication']
                ]
        );
        return $result;
    }
    
    public function getLivre($isbnLivre) {
        $sql = 'select * '
                . 'from livres '
                . 'where isbn = ?';
        $livre = $this->executerRequete($sql, [$isbnLivre]);
        if ($livre->rowCount() == 1) {
            return $livre->fetch();
        } else {
            throw new Exception("Aucun livre ne correspond à l'identifiant '$isbnLivre'");
        }
    }
    
    public function updateLivre($livre) {
        $sql = 'UPDATE livres SET '
                . 'isbn = ?, '
                . 'titre = ?, '
                . 'annéePublication = ? '
                . 'where isbn = ?';
        $result = $this->executerRequete($sql, [
            $livre['isbn'], 
            $livre['titre'], 
            $livre['annéePublication'],
            $livre['isbn']
                ]
        );
        return $result;
    }
    
    public function deleteLivre($isbnLivre) {
        $sql = 'DELETE FROM livres WHERE isbn = ?';
        $result = $this->executerRequete($sql, [$isbnLivre]);
        return $result;
    }
    
}