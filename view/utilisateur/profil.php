<?php
$user = $_SESSION['user'];
$id = $_SESSION['user']->getId();
?>

<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/profil.css">
</head>

<div class="user-info">

<a class="edit-icon" href="?ctrl=utilisateur&method=editProfil&id=<?= $_SESSION['user']->getId() ?>"><i class="fas fa-user-edit"></i></a>

    <div class="avatar">
        <img src="<?= $user->getAvatar() ?>" alt="">
        <h3><?= $user->getPseudo() ?></h3>
    </div>

    <div class="user-email flex">
        <div class="content">
            <h4>Email</h4>
            <p><?= $user->getEmail() ?></p>
        </div>
    </div>

    <div class="user-email flex">
        <div class="content">
            <h4>Rang</h4>
            <p><?= $user->getRang() ?></p>
        </div>
    </div>

    <div class="user-mdp flex">
        <div class="content">
            <h4>Mot de passe</h4>
            <p>********</p>
        </div>
    </div>

    <div class="user-inscription">
        <div class="content">
            <h4>Date d'inscription</h4>
            <p><?= $user->getDateInscription('d/m/Y | H:i') ?></p>

        </div>
    </div>
    <div class="delete">

        <a class="btn-delete" href="#">Supprimer mon compte</a>
    </div>

</div>

<div class="user-stat">
        <h3>Statistique de <span><?= $user->getPseudo() ?></span></h3>

        <div class="content-stat">

        <div class="sujet-stat flex">

            <h4>Nombre de sujet(s) crée: </h4>
            <p><?= $data['nbSujet']->getNbsujet() ?></p>
        </div>

        <div class="msg-stat flex">

            <h4>Nombre de message(s) crée: </h4>
            <p><?= $data['nbMsg']->getNbMsg() ?></p>
        </div>
        </div>
    </div>
