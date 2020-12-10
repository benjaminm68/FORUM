<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3997b565b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/connexion.css">
    <title>Connexion</title>
</head>




<div class="connexion">

    <h2 class="h2-connexion">Connexion</h2>
    <form action="?ctrl=security&method=login" method="POST">

        <!-- MESSAGE INSCRIPTION REUSSIE -->

        <?php if (isset($_SESSION['inscription_ok'])) { ?>

            <p class="ok">Inscription réussie, vous pouvez vous connecter</p>

        <?php } ?>
        <!-- FIN MESSAGE -->

        <!-- MESSAGE ERROR CHAMPS -->

        <?php if (isset($_SESSION['champ_vide'])) { ?>

            <p class="error">Certains champs n'ont pas été remplis</p>

        <?php } ?>
        <!-- FIN MESSAGE -->

        <!-- MESSAGE ERROR SI AUCUNE CORRESPONDENCE -->

        <?php if (isset($_SESSION['error'])) { ?>

            <p class="error">Pseudo ou Email invalide</p>

        <?php } ?>
        <!-- FIN MESSAGE -->

        <!-- MESSAGE ERROR MDP -->
        <?php if (isset($_SESSION['error_mdp'])) { ?>

            <p class="error">Mot de passe incorrect</p>

        <?php } ?>
        <!-- FIN MESSAGE -->



        <div class="pseudo">
            <label for="pseudo">Pseudo ou email <span>*</span> </label>
            <input type="text" name="email">
        </div>

        <div class="mdp">
            <label for="password">Mot de passe <span>*</span></label>
            <input type="password" name="mdp">
            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        </div>

        <input class="btn" type="submit" value="Se connecter">
    </form>

    <div class="inscription flex">
        <p>Pas encore inscrit ?</p>

        <a href="?ctrl=security&method=inscription">Inscrivez-vous</a>
    </div>
</div>
<!-- <div class="fleche">
        <i class="fas fa-arrow-circle-right"></i>
        <p>Accèder directement au forum</p>
        </div> -->