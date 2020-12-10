<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3997b565b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Communauté Web</title>
</head>

<body>

    <header class="flex padding">

        <a href="?ctrl=home&method=index">
            <h1>Communauté Web</h1>
        </a>

        <div class="connect-top flex">

        <?php

use App\Session;

if(App\Session::getUser()){
                    ?>
                    <a class="btn btn-connect deconnexion" href="?ctrl=security&method=logout"> <i class="fas fa-user"></i>Déconnexion</a>
                    <?php
                }
                else{
                    ?>
                <p>Pas encore inscrit ? </p>
                <a href="?ctrl=security&method=inscription">Incrivez-vous !</a>
                <a class="btn btn-connect" href="?ctrl=security&method=connexion"> <i class="fas fa-user"></i>Se connecter</a>
                
                    <?php
                }
            ?>
        </div>

    </header>
    <div class="bottom-header flex padding">
        <nav class="flex">
            

            <?php
                if(App\Session::getUser()){?>
                    <a class="active" href="?ctrl=home&method=index">Accueil</a>
                    <a href="#">Règles</a>
                    <a href="#">Équipe</a>
                    <a href="?ctrl=utilisateur&method=afficherProfil&id=<?= $_SESSION['user']->getId() ?>">Mon profil</a><?php
                }
                else{
                    ?>
                    <a class="active" href="?ctrl=home&method=index">Accueil</a>
                    <a href="#">Règles</a>
                    <?php
                }
            ?>

            <?php if(Session::getUser() AND Session::getUser()->getRang() === "admin"){ ?>
                <a href="?ctrl=forum&method=panelAdmin">Panel admin</a>
            <?php } ?>
        </nav>

     <form action="?ctrl=sujet&method=rechercherSujet" method="POST">
         <i class="fas fa-search"></i>
         <input type="search" name="q" value="" placeholder="Rechercher un sujet">
         <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
              
     </form>

   
    
        
    </div>

    <main class="padding">

        <div id="page">
            <?= $page ?>
        </div>
    </main>


    <footer class="padding flex">

        <a class="copyright" href="#">&copy; Communauté Web</a>

        <section class="social">
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-facebook-f"></i></a>
        </section>


        <a href="#">Nous contacter</a>

    </footer>





    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="public/js/app.js"></script>

    
</body>

</html>