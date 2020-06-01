<?php $this->titre = "Demander" ?>

<form action="ClientLivres/nouvelleUtilisateurDemande" method="post">
    <h2>Information de la demande</h2>
    <p>
        <label for="date_location">Date de la location : </label><input type="date" name="date_location" id="date_location"/><br/>
        <label for="details">Détails : </label><input type="text" name="details" id="details"/><br/>
        <input type="hidden" name="livre_isbn" value="<?= $this->nettoyer($isbnLivre) ?>"/>
        <input type="hidden" name="utilisateur_id" value="<?= $this->nettoyer($idUtilisateur) ?>"/>
        <input type="submit" value="Demander"/>
    </p>
</form>