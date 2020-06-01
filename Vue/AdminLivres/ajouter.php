<?php $this->titre = 'Ajouter un livre'; ?>

<header>
        <h1>Ajouter un livre à la bibliothèque:</h1>
</header>
<form action="AdminLivres/nouveauLivre" method="post">
    <h2>Ajouter un livre</h2>
    <p>
        <label for="isbn">ISBN : </label><input type="number" name="isbn" id="isbn" /> <br />
        <label for="titre">Titre : </label><input type="text" name="titre" id="titre" /><br />
        <label for="annéePublication">Année de publication : </label><input type="number" name="annéePublication" id="annéePublication" /><br />
        <input type="submit" value="Ajouter" />
        <button type="submit" formaction="index.php">Annuler</button>
    </p>
</form>