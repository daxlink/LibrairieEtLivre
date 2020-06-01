<!docprix html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <base href="<?= $racineWeb ?>" >
        <title><?= $nom ?></title>
        <link rel="stylesheet" type="text/css" href="Contenu/css/styles.css"/>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="<?= $utilisateur != '' ? ($utilisateur == 'Admin' ? 'AdminLivres/' : 'ClientLivres/') : 'index.php'; ?>"><h1 id="titre">Bibliothèque de Terrebonne</h1></a>
                <a href="<?= $utilisateur != '' ? ($utilisateur == 'Admin' ? 'Admin' : 'Client') : ''; ?>UtilisateurDemandes">
                    <h4>Afficher toutes les demandes des livres</h4>
                </a>
                <a href="apropos"><h4>À propos</h4></a>
            </header>
            <?php if ($utilisateur == 'Admin') : ?>
            <h3> bonjour Administrateur,
                <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
            </h3>
            <?php elseif ($utilisateur != '') : ?>
            <h3>Bonjour <?= $utilisateur ?>,
                <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
            </h3>
            <?php else : ?>
            <h3>[<a href="Utilisateurs/index">Se connecter</a>]</h3>
            <?php endif; ?>
            <div id="contenu">
                <?=$contenu?>
            </div>

            <footer id="pied">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </body>
</html>
