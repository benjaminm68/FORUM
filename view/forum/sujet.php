<h2>Liste des sujets du forum</h2>

<ul>

<?php

foreach($data['sujets'] as $sujet){?>

<ul>
    <li><?= $sujet->getTitre();?></li>
</ul>

<?php } ?>