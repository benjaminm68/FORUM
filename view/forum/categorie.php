<h2>Liste des catégories du forum</h2>

<ul>

<?php

var_dump($data['nbSujet']);

foreach($data['categories'] as $cat){?>

<ul>
    <li><?= $cat->getTitre();?></li>
</ul>

<?php } ?>