<?php
$user = $_SESSION['user'];
$id = $_SESSION['user']->getId();
?>


<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/modifEmail.css">
</head>


<div class="user-stat modif">
    <h3>Modifier mon Pseudo</h3>

    <div class="content-stat">

        <form action="#" method="POST">
            <div class="top-form">
            
                <label for="Ancien email">Pseudo actuel</label>
                <input type="text" value="<?= $_SESSION['user']->getPseudo() ?>" disabled>
            </div>

            <div class="bottom-form">

                <label for="new email">Nouveau pseudo <span>*</span></label>
                <input type="text" name="email" value="" required>
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            </div>

            <input type="submit" value="Changer de pseudo">

        </form>


    </div>
</div>




<div class="user-stat modif">
    <h3>Modifier mon Email</h3>

    <div class="content-stat">

    <?php if(isset($_SESSION['error_new_mail'])){ ?>
<p class="error">Le champ 'nouvel email' n'a pas été rempli !</p>
    <?php } ?>

        <form action="?ctrl=utilisateur&method=modifierEmail&id=<?= $_SESSION['user']->getId() ?>" method="POST">
            <div class="top-form">
            
                <label for="Ancien email">Email actuel</label>
                <input type="text" value="<?= $_SESSION['user']->getEmail() ?>" disabled>
            </div>

            <div class="bottom-form">

                <label for="new email">Nouvel email <span>*</span></label>
                <input type="email" name="email" value="" required>
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
            </div>

            <input type="submit" value="Changer d'email">

        </form>


    </div>
</div>

