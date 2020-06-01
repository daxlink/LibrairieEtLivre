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
                <br/>
                <?php if ($idUtilisateur == $utilisateurDemande['utilisateur_id']) : ?>
                    <a href="ClientUtilisateurDemandes/supprimer/<?= $this->nettoyer($utilisateurDemande['id']) ?>">[Supprimer]</a>
                <?php endif; ?>
            </p>
        </header>
    </article>
    <hr />
<?php endforeach; ?>
            
