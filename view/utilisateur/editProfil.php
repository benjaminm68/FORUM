<?php
$user = $_SESSION['user'];
$id = $_SESSION['user']->getId();
?>


<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/profil.css">
    <link rel="stylesheet" href="public/css/editprofil.css">
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

<div class="edit">

    <!-- MODIFIER LE PSEUDO -->

    <div class="user-stat modif">
        <h3>Modifier mon Pseudo</h3>

        <div class="content-stat">
            <?php if (isset($_SESSION['error'])) { ?>
                <p class="error">Pseudo déjà utilisé !</p>

            <?php } ?>

            <form action="?ctrl=utilisateur&method=modifierPseudo&id=<?= $_SESSION['user']->getId() ?>" method="POST">

                <div class="bottom-form">
                    <input type="text" name="pseudo" placeholder="Entrer votre nouveau pseudo" required>
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                </div>

                <input type="submit" value="Changer de pseudo">

            </form>


        </div>
    </div>
    <!-- MODIFIER AVATAR -->
    <div class="user-stat modif">
        <h3>Modifier mon avatar</h3>

        <div class="content-stat">

            <form action="?ctrl=utilisateur&method=modifierAvatar&id=<?= $_SESSION['user']->getId() ?>" method="POST" enctype="multipart/form-data">
                <div>

                    <input style="border: none;" type="file" id="file" name="avatar" multiple>
                    <input type="submit" value="envoyer">
                </div>

            </form>

        </div>
    </div>

    <!-- MODIFIER L'EMAIL -->

    <div class="user-stat modif">
        <h3>Modifier mon Email</h3>

        <div class="content-stat">

            <?php if (isset($_SESSION['error_new_mail'])) { ?>
                <p class="error">Le champ 'nouvel email' n'a pas été rempli !</p>
            <?php } ?>

            <?php if (isset($_SESSION['email_exist'])) { ?>
                <p class="error">Email déjà existant !</p>
            <?php } ?>

            <form action="?ctrl=utilisateur&method=modifierEmail&id=<?= $_SESSION['user']->getId() ?>" method="POST">

                <div class="bottom-form">

                    <input type="email" name="email" placeholder="Entrer votre nouvel email" required>
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                </div>

                <input type="submit" value="Changer d'email">

            </form>


        </div>
    </div>

    <!-- MODIFIER LE MOT DE PASSE -->

    <div class="user-stat modif">
        <h3>Modifier mon mot de passe</h3>

        <div class="content-stat">

            <form action="?ctrl=utilisateur&method=modifierMdp&id=<?= $_SESSION['user']->getId() ?>" method="POST">

                <!-- ERREUR MDP NON IDENTIQUE -->
                <?php if(isset($_SESSION['error_newmdp_identique'])){?>
                
                <p class="error">Les mots de passe ne sont pas identique</p>
                <?php } ?>


                <!-- ERREUR MDP ACTUEL INVALIDE EN BDD -->
                <?php if(isset($_SESSION['error_mdp_bdd'])){?>
                
                <p class="error">Mot de passe actuel invalide</p>
                <?php } ?>

                <!-- ERREUR UN OU PLUSIEURS CHAMPS SONT VIDE -->
                <?php if(isset($_SESSION['error_champvide'])){?>
                
                <p class="error">Un ou plusieurs champs sont vide</p>
                <?php } ?>

                <!-- MESSAGE DE SUCCES -->
                <?php if(isset($_SESSION['newmdp_ok'])){?>
                
                <p style="color: green;">Le mot de passe a bien été changé</p>
                <?php } ?>

                
                <div class="bottom-form">

                    <input type="password" name="mdp" placeholder="Mot de passe actuel" required>
                    <p></p>
                    <input type="password" name="newmdp" placeholder="Nouveau mot de passe" required>
                    <p></p>
                    <input type="password" name="newmdp2" placeholder="Confirmer le nouveau mot de passe" required>
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                </div>

                <input type="submit" value="Changer de mot de passe">

            </form>


        </div>
    </div>


</div>