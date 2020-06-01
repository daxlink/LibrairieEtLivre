<?php $this->titre = "Modifier - " . $this->nettoyer($livre['titre']); ?>

<header>
    <h1>Modifier le livre <?php $this->nettoyer($livre['titre']) ?></h1>
</header>
<form action="AdminLivres/MaJ" method="post">
    <h2>Modifier un livre</h2>
    <p>
        <label for="isbn">ISBN : </label><input type="number" name="isbn" id="isbn" value="<?= $this->nettoyer($livre['isbn']) ?>" /> <br />
        <label for="titre">Description</label> :  <input type="text" name="titre" id="titre" value="<?= $this->nettoyer($livre['titre']) ?>" /><br />
        <label for="annéePublication">Prix</label> : <input type="number" name="annéePublication" id="annéePublication" value="<?= $this->nettoyer($livre['annéePublication']) ?>" /><br />
        <input type="submit" value="Modifier" />
        <button type="submit" formaction="index.php">Annuler</button>
    </p>
</form>