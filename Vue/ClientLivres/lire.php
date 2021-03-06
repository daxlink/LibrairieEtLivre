<?php $this->titre = $this->nettoyer($livre['titre']); ?>

<article>
    <header>
        <h1><?= $this->nettoyer($livre['titre']) ?></h1>
        <h3>ISBN : <?= $this->nettoyer($livre['isbn']) ?></h3>
        <p>Année de publication : <?= $this->nettoyer($livre['annéePublication']) ?></p>
    </header>
</article>
<hr/>
<article>
    <header>
        <h1>Demandes de prêt des utilisateurs : </h1>
    </header>
    <?php foreach ($utilisateurDemandes as $utilisateurDemande): ?>
        <p>
            Nom du client : <?= $this->nettoyer($utilisateurDemande['prénom']) ?> <?= $this->nettoyer($utilisateurDemande['nom']) ?>
            <br/>
            Date de la demande : <?= $this->nettoyer($utilisateurDemande['date_demande']) ?>
            <br/>
            Date de la location : <?= $this->nettoyer($utilisateurDemande['date_location']) ?>
            <br/>
            Détails : <?= $this->nettoyer($utilisateurDemande['details']) ?>
            <br/>
            <?php if ($idUtilisateur == $utilisateurDemande['utilisateur_id']) : ?>
                <a href="ClientLivres/supprimer/<?= $this->nettoyer($utilisateurDemande['id']) ?>">[Supprimer]</a>
            <?php endif; ?>
        </p>
    <?php endforeach; ?>
</article>
<a href="ClientLivres/ajouter/<?= $this->nettoyer($livre['isbn']) ?>"><h2>Faire une demande</h2></a>