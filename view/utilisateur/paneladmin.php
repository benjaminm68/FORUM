<?php
$user = $_SESSION['user'];
$id = $_SESSION['user']->getId();
?>


<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/profil.css">
    <link rel="stylesheet" href="public/css/paneladmin.css">
</head>

<div class="user-info panel">

    <h3>Liste des utilisateurs</h3>

    <form action="?ctrl=utilisateur&method=rechercherUser" method="POST">

        <input type="search" name="search" id="search" value="" placeholder="Rechercher un utilisateur">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

        <div id="suggestions">

            <ul>

            </ul>
        </div>

    </form>

    <?php foreach ($data['utilisateurs'] as $utilisateur) { ?>

        <ul>
            <li><a href="?ctrl=utilisateur&method=profilUser&id=<?= $utilisateur->getId() ?>"><?= $utilisateur->getPseudo() ?></a></li>
        </ul>

    <?php } ?>

</div>