<?php ob_start(); ?>

<section class="flex items-center px-8 py-16 bg-gray-900">
    <div class="w-1/2">
        <h1 class="text-6xl font-black uppercase">THE ELITE<br><span class="text-blue-500">ROSTER</span></h1>
        <p class="mt-4 text-gray-400">Track the performance of the world's greatest athletes.</p>
        <div class="flex gap-3 mt-8">
            <button class="bg-blue-600 px-4 py-2 text-sm font-bold">ALL TEAMS</button>
            <button class="border border-gray-600 px-4 py-2 text-sm">LAKERS</button>
            <button class="border border-gray-600 px-4 py-2 text-sm">WARRIORS</button>
            <button class="border border-gray-600 px-4 py-2 text-sm">CELTICS</button>
        </div>
    </div>
</section>

<section class="grid grid-cols-4 gap-4">
    <?php foreach ($players as $player): ?>
        <div class="bg-gray-800 p-4">
            <p><?= $player['first_name'] ?> <?= $player['last_name'] ?></p>
        </div>
    <?php endforeach; ?>
</section>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>