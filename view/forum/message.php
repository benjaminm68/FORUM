<h2>Liste des Messages du forum</h2>

<ul>

<?php
// var_dump($data);

foreach($data['messages'] as $message){?>

<ul>
<p><?= $message->getContenu(); ?></p>

</ul>

<?php } ?>