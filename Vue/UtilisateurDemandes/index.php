<?php $this->titre = 'Liste Demandes'; ?>
<?php foreach($utilisateurDemandes as $utilisateurDemande):?>
    <article>
        <header>
            <p>
                Nom du client : <?= $this->nettoyer($utilisateurDemande['prénom']) ?> <?= $this->nettoyer($utilisateurDemande['nom']) ?>
                <br/>
                Livre : <?= $this->nettoyer($utilisateurDemande['titre']) ?>
                <br/>
                Date de la demande : <?= $this->nettoyer($utilisateurDemande['date_demande']) ?>
                <br/>
                Date de la location : <?= $this->nettoyer($utilisateurDemande['date_location']) ?>
                <br/>
                Détails : <?= $this->nettoyer($utilisateurDemande['details']) ?>
            </p>
        </header>
    </article>
    <hr />
<?php endforeach; ?>