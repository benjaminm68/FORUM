<h2>Liste des utilisateurs du forum</h2>

<ul>

<?php
// var_dump($data);

foreach($data['utilisateurs'] as $utilisateur){?>

<ul>
<a href=""><?= $utilisateur->getPseudo(); ?></a>

</ul>

<?php } ?>