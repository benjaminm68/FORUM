<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/sujetbycat.css">
    <link rel="stylesheet" href="public/css/creersujet.css">

</head>


<h3> Editer votre sujet</h3>

<?php 
if(isset($_SESSION['error_edit'])){?>
<p class="error">Vous devez remplir tous les champs obligatoire !</p>
<?php } ?>
  

<div class="bienvenue">
    <div class="bienvenue-content">

    <form action="?ctrl=sujet&method=editerSujet&id=<?= $data['editSujet']->getId() ?>&id_cat=<?= $data['categorie']->getId() ?>" method="POST">

    <div class="titre-form">
        <label for="titre">Titre <span>*</span></label>
        <input type="text" name="titre" value="<?= $data['editSujet']->getTitre() ?>">
    </div>

    <div class="message-form">
        <label for="message">Message <span>*</span></label>
        <textarea name="message" id=""><?= $data['editSujet']->getContenuSujet() ?></textarea>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    </div>

    <input type="submit" value="Editer le sujet">

    </form>

        
        <p></p>

    </div>
</div>