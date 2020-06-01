<?php $this->titre = 'Supprimer - ' . $this->nettoyer($livre['titre']); ?>

<header>
        <h1>Êtes-vous sûr de vouloir supprimer ce livre?</h1>
</header>
<article>
    <p>
        ISBN : <?= $this->nettoyer($livre['isbn']) ?><br/>
        Titre : <?= $this->nettoyer($livre['titre']) ?><br/>
        Année de publication : <?= $this->nettoyer($livre['annéePublication']) ?>
    </p>
</article>
<form action="AdminLivres/confirmerLivre" method="post">
    <input type="hidden" name="isbn" value="<?= $this->nettoyer($livre['isbn']) ?>"/>
    <input type="submit" value="Supprimer"/>
    <button type="submit" formaction="index.php">Annuler</button>
</form>