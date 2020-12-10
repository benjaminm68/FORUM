<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/sujetbycat.css">

</head>

<div class="bienvenue">
    <div class="bienvenue-content">

        <h3> <?= $data['categorie']->getTitre(); ?></h3>
        <p><?= $data['categorie']->getDescription() ?></p>

    </div>
</div>

<?php
if (App\Session::getUser()) {
?>
    <div class="action">
        <a class="btn btn-connect" href="?ctrl=sujet&method=afficherCreerSujet&id_cat=<?= $data['categorie']->getId() ?>">Nouveau sujet</a>
    </div>
<?php
} else {
?>

<?php
}

?>

<section class="section-forum cw">
    <h3>Pagination</h3>

    <article class="sujet">

        <?php

        foreach ($data['sujetByCat'] as $sujetByCat) { ?>

            <div class="sujet-content flex">

                <div class="sujet-img">

                </div>

                <div class="titre-sujet">

                    <a href="?ctrl=message&method=msgBySujet&id=<?= $sujetByCat->getId(); ?>&id_cat=<?= $data['categorie']->getId() ?>"><?= $sujetByCat->getTitre(); ?></a>

                    <p><?= $sujetByCat->getUtilisateur()->getPseudo() ?>, <?= $sujetByCat->getDateCreation("l H:i") ?></p>

                </div>

                <div class="stat">
                    <p>450</p>
                    <p>Réponses</p>
                </div>

                <div class="last-msg">
                    <p>Dernier msg</p>
                    <p>par Pseudo , heure</p>
                </div>

            </div>

        <?php } ?>

    </article>
</section>


<p><a href="?ctrl=forum&method=listCategorie">Accéder aux Catégories</a></p>

<p><a href="?ctrl=forum&method=listSujet">Accéder aux Sujets</a></p>

<p><a href="?ctrl=forum&method=listMessage">Accéder aux Messages</a></p>

<p><a href="?ctrl=forum&method=listUtilisateur">Accéder aux Utilisateurs</a></p>

<ul>