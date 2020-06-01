<?php $this->titre = 'Livres de la bibliothèque'; ?>

<a href="AdminLivres/ajouter"><h2>Ajouter un livre</h2></a>
<?php foreach($livres as $livre):?>
    <article>
        <header>
            <a href="AdminLivres/lire/<?= $this->nettoyer($livre['isbn']) ?>">
                <h1><?= $this->nettoyer($livre['titre']) ?></h1>
            </a>
            <p><?= $this->nettoyer($livre['annéePublication']) ?></p>
            <p>
                <a href="AdminLivres/modifier/<?= $this->nettoyer($livre['isbn']) ?>">[Modifier]</a>
                <a href="AdminLivres/supprimerLivre/<?= $this->nettoyer($livre['isbn']) ?>">[Supprimer]</a>
            </p>
        </header>
    </article>
    <hr />
<?php endforeach; ?>