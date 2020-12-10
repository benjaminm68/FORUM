<head>
    <link rel="stylesheet" href="public/css/accueil.css">
    <link rel="stylesheet" href="public/css/sujetbycat.css">
    <link rel="stylesheet" href="public/css/creersujet.css">

</head>


<h3> Créer un nouveau sujet</h3>

<div class="bienvenue">
    <div class="bienvenue-content">

    <form action="?ctrl=sujet&method=CreerNouveauSujet&id_cat=<?= $data['categorie']->getId() ?>" method="POST">

    <div class="titre-form">
        <label for="titre">Titre <span>*</span></label>
        <input type="text" name="titre">
    </div>

    <div class="message-form">
        <label for="message">Message <span>*</span></label>
        <textarea name="message" id=""></textarea>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
    </div>

    <input type="submit" value="Créer le sujet">

    </form>

        
        <p></p>

    </div>
</div>