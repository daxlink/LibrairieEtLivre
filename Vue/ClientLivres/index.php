<?php $this->titre = 'Livres de la bibliothèque'; ?>

<?php foreach($livres as $livre):?>
    <article>
        <header>
            <a href="ClientLivres/lire/<?= $this->nettoyer($livre['isbn']) ?>">
                <h1><?= $this->nettoyer($livre['titre']) ?></h1>
            </a>
            <p><?= $this->nettoyer($livre['annéePublication']) ?></p>
        </header>
    </article>
    <hr />
<?php endforeach; ?>