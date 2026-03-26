<h1>Liste des joueurs</h1>
<?php foreach ($players as $player): ?>
    <p><?= $player['first_name'] ?> <?= $player['last_name'] ?></p>
<?php endforeach; ?>