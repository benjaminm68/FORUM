<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3997b565b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/connexion.css">
    <title>Inscription</title>
</head>





<div class="connexion">


    <h2 class="h2-connexion">Inscription</h2>
    <form action="?ctrl=security&method=addUser" method="POST">
        <!-- MESSAGE ERROR MDP -->
        <?php if (isset($_SESSION['inscription_fail'])) { ?>

            <p class="error">Une erreur est survenue veuillez recommencer</p>

        <?php } ?>
        <!-- FIN MESSAGE -->

        <div class="pseudo">
            <!-- MESSAGE PSEUDO UTILISÉ -->
            <?php
            if (isset($_SESSION['pseudo_exist'])) { ?>
                <p class="error">Pseudo déjà utilisé</p>
            <?php } ?>
            <!-- FIN MESSAGE -->


            <label for="pseudo">Pseudo <span>*</span></label>
            <input type="text" name="pseudo" required>
        </div>

        <div class="email">
            <!-- MESSAGE PSEUDO UTILISÉ -->
            <?php
            if (isset($_SESSION['email_exist'])) { ?>
                <p class="error">Email déjà utilisé</p>
            <?php } ?>
            <!-- FIN MESSAGE -->

            <label for="email">Email <span>*</span></label>
            <input type="email" name="email" required>
        </div>

        <div class="mdp">
            <!-- MESSAGE MDP NON IDENTIQUE -->
            <?php
            if (isset($_SESSION['error_mdp'])) { ?>
                <p class="error">Les mot de passe ne sont pas identique</p>
            <?php } ?>
            <!-- FIN MESSAGE -->

            <!-- MESSAGE MDP TROP COURT -->
            <?php
            if (isset($_SESSION['error_mdp_taille'])) { ?>
                <p class="error">Le mot de passe doit contenir au minimum 8 caractères</p>
            <?php } ?>
            <!-- FIN MESSAGE -->
            <label for="password">Mot de passe <span>*</span></label>
            <input type="password" name="mdp" required>
        </div>

        <div class="mdp">
            <label for="password2">Confirmer votre mot de passe <span>*</span></label>
            <input type="password" name="mdp2" required>

            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        </div>

        <input class="btn" type="submit" value="S'inscrire">
    </form>

    <div class="inscription flex">
        <p>Déjà inscrit ?</p>

        <a href="?ctrl=security&method=connexion">Connectez-vous</a>
    </div>
</div>



<!-- <div class="fleche">
        <i class="fas fa-arrow-circle-right"></i>
        <p>Accèder directement au forum</p>
        </div> -->