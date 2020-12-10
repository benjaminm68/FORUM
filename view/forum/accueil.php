<head>
    <link rel="stylesheet" href="public/css/accueil.css">
</head>

<div class="bienvenue">
    <div class="bienvenue-content">
        <h3>Bienvenue <span><?php if (isset($_SESSION['user'])) {
                                echo $_SESSION['user']->getPseudo();
                            } ?></span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, optio ratione? Nihil repellat quia cumque harum? Nulla, mollitia modi. Possimus ducimus voluptate neque excepturi voluptatibus architecto dolorem repudiandae libero explicabo.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi quisquam pariatur iure dolorem ducimus magnam. Fugiat natus, explicabo dolorem laudantium optio quae enim suscipit illum autem sapiente molestias maiores nulla.
        </p>
        <div class="bienvenue-connect">

            <?php

            if (App\Session::getUser()) {
            ?>

            <?php
            } else {
            ?>
                <a class="btn btn-connect" href="?ctrl=security&method=connexion"> <i class="fas fa-user"></i>Se connecter</a> ou
                <a class="btn btn-connect" href="?ctrl=security&method=inscription"> <i class="fas fa-user"></i>S'inscrire</a>

            <?php
            }
            ?>

        </div>
    </div>
</div>

<section class="section-forum cw">
    <h3>Communauté Web</h3>

    <article class="categorie">

        <?php

        foreach ($data['categories'] as $cat) { ?>

            <div class="categ-content flex">

                <div class="categ-img">
                    <img src="<?= $cat->getIcon() ?>" alt="">
                </div>

                <div class="titre-desc">
                    <a href="?ctrl=sujet&method=listSujetByCat&id=<?= $cat->getId() ?>"><?= $cat->getTitre(); ?></a>
                    <p><?= $cat->getDescription() ?></p>
                </div>

                <div class="stat">
                    <?php foreach ($data['nbSujetByCat'] as $nbSujet) {

                        if ($nbSujet->getTitre() == $cat->getTitre()) { ?>

                            <p><?= $nbSujet->getNbSujet() ?></p>

                    <?php }
                    } ?>

                   
                    <p>Sujets</p>
                </div>

                <div class="last-sujet">
                    <p>Titre sujet</p>
                    <p>crée par Pseudo il y a 1h</p>
                </div>

            </div>

        <?php } ?>

    </article>
</section>

<section class="section-forum cw">
    <h3>Espace Technique</h3>

    <article class="categorie">

        <?php
        // var_dump($data);
        foreach ($data['categories'] as $cat) { ?>

            <div class="categ-content flex">

                <div class="categ-img">
                    <img src="<?= $cat->getIcon() ?>" alt="">
                </div>

                <div class="titre-desc">
                    <a href="?ctrl=sujet&method=listSujetByCat&id=<?= $cat->getId() ?>"><?= $cat->getTitre(); ?></a>
                    <p><?= $cat->getDescription() ?></p>
                </div>

                <div class="stat">
                    <p>450</p>
                    <p>Sujets</p>
                </div>

                <div class="last-sujet">
                    <p>Titre sujet</p>
                    <p>crée par Pseudo il y a 1h</p>
                </div>

            </div>

        <?php } ?>

    </article>
</section>


<p><a href="?ctrl=forum&method=listCategorie">Accéder aux Catégories</a></p>

<p><a href="?ctrl=sujet&method=listSujet">Accéder aux Sujets</a></p>

<p><a href="?ctrl=forum&method=listMessage">Accéder aux Messages</a></p>

<p><a href="?ctrl=forum&method=listUtilisateur">Accéder aux Utilisateurs</a></p>