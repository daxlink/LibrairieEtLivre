<?php $this->titre = 'Supprimer Demande'; ?>

<header>
        <h1>Êtes-vous sûr de vouloir supprimer cette demande?</h1>
</header>
<article>
    <p>
        Livre ISBN : <?= $this->nettoyer($utilisateurDemande['livre_isbn']) ?><br/>
        Date de la demande : <?= $this->nettoyer($utilisateurDemande['date_demande']) ?><br/>
        Date de la location : <?= $this->nettoyer($utilisateurDemande['date_location']) ?><br/>
        details : <?= $this->nettoyer($utilisateurDemande['details']) ?>
    </p>
</article>
<form action="AdminLivres/confirmerUtilisateurDemande" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($utilisateurDemande['id']) ?>"/>
    <input type="submit" value="Supprimer"/>
    <button type="submit" formaction="AdminLivres">Annuler</button>
</form>
