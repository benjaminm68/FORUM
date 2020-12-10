<h2>Résultat recherche pour <span style="color: red;"><?= $_POST['q'] ?></span></h2>

<ul>

<?php

foreach($data['recherche'] as $recherche){?>
<ul>
<li><a href="?ctrl=message&method=msgBySujet&id=<?= $recherche->getId(); ?>&id_cat=<?= $recherche->getCategorieId() ?>"><?= $recherche->getTitre(); ?></a></li>
</ul>

<?php } ?>