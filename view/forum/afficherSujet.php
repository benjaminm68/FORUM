<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/sujet.css">
    <link rel="stylesheet" href="public/css/creersujet.css">
</head>


<div class="bienvenue">

    <div class="bienvenue-content">

   

        <h3><?= $data['sujet']->getTitre(); ?></h3>
        <p>Catégorie: <?= $data['categorie']->getTitre() ?></p>
    </div>
</div>

<div class="action">
    <?php
    if (App\Session::getUser()) {
    ?>

        <a class="btn btn-connect" href="#newmsg">Répondre</a>


    <?php
    } else {
    ?>

    <?php
    }

    ?>

    <?php
    if (App\Session::getUser()) {
        if (App\Session::getUser()->getId() === $data['sujet']->getUtilisateur()->getId()) {


    ?>
            <a class="btn btn-connect " href="?ctrl=sujet&method=afficherEditerSujet&id=<?= $data['sujet']->getId() ?>&id_cat=<?= $data['categorie']->getId() ?>">Editer</a>
            <a class="btn btn-connect btn-supp" href="?ctrl=sujet&method=supprimerSujet&id=<?= $data['sujet']->getId() ?>&id_cat=<?= $data['categorie']->getId() ?>">Supprimer Sujet</a>

        <?php
        } else {
        ?>

    <?php
        }
    }

    ?>
</div>

<section class="section-forum flex">

    <div class="user">
        <figure>
            <img src="<?= $data['sujet']->getUtilisateur()->getAvatar() ?>" alt="">
        </figure>

        <h4><?= $data['sujet']->getUtilisateur()->getPseudo() ?></h4>
        <p><?= $data['sujet']->getUtilisateur()->getRang() ?></p>
        <p>NB msg</p>
    </div>

    <div class="contenu">

        <div class="heure">
            <p>Posté le: <?= $data['sujet']->getDateCreation('d/m/Y | H:i') ?></p>
        </div>

        <p><?= $data['sujet']->getContenuSujet() ?></p>
    </div>

</section>

<?php

foreach ($data['messages'] as $msg) { ?>

    <section class="section-forum flex">

        <div class="user">
            <figure>
                <img src="<?= $msg->getUtilisateur()->getAvatar()  ?>" alt="">
            </figure>

            <h4><?= $msg->getUtilisateur()->getPseudo()  ?></h4>
            <p><?= $msg->getUtilisateur()->getRang()  ?></p>
            <p>NB msg</p>
        </div>

        <div class="contenu">

            <div class="heure">
                <p>Posté le: <?= $msg->getDateCreation('d/m/Y | H:i') ?></p>
            </div>

            <p id="lastmsg"><?= $msg->getContenu() ?></p>
        </div>

    </section>

<?php } ?>

<?php if (App\Session::getUser()) { ?>
    <div class="bienvenue newmsg" id="newmsg">
        <div class="bienvenue-content">

            <form action="?ctrl=message&method=ajoutMessage&id=<?= $data['sujet']->getId()?>&id_cat=<?= $_GET['id_cat'] ?>" method="POST">

                <div class="message-form">
                    <label for="message">Message <span>*</span></label>
                    <textarea name="message" id=""></textarea>
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                </div>

                <input type="submit" value="Envoyer">

            </form>


            <p></p>

        </div>
    </div>

<?php } ?>



