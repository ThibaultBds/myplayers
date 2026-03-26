<?php ob_start(); ?>

<!-- HERO -->
<section class="relative px-8 py-20 bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900 to-transparent z-0"></div>
    <div class="relative z-10 max-w-xl">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-4">Season 2024-25</p>
        <h1 class="text-7xl font-black uppercase leading-none">THE<br>ELITE<br><span class="text-blue-500">ROSTER</span></h1>
        <p class="mt-6 text-gray-400 text-lg">Track the performance of the world's greatest NBA athletes.</p>
        <div class="flex gap-3 mt-10 flex-wrap">
            <button class="bg-blue-600 hover:bg-blue-500 px-5 py-2 text-sm font-bold uppercase tracking-widest rounded transition">All Teams</button>
            <button class="border border-gray-600 hover:border-gray-400 px-5 py-2 text-sm font-semibold uppercase tracking-widest rounded text-gray-400 hover:text-white transition">Lakers</button>
            <button class="border border-gray-600 hover:border-gray-400 px-5 py-2 text-sm font-semibold uppercase tracking-widest rounded text-gray-400 hover:text-white transition">Warriors</button>
            <button class="border border-gray-600 hover:border-gray-400 px-5 py-2 text-sm font-semibold uppercase tracking-widest rounded text-gray-400 hover:text-white transition">Celtics</button>
        </div>
    </div>
</section>

<!-- PLAYERS GRID -->
<section class="px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-1">Trending Talent</p>
            <h2 class="text-3xl font-black uppercase">Season Leaders</h2>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4">
        <?php foreach ($players as $player): ?>
            <a href="/players/<?= $player['id'] ?>" class="bg-gray-800 p-6 h-52 flex flex-col justify-end rounded-xl hover:bg-gray-700 hover:ring-1 hover:ring-blue-500 transition group">
                <p class="text-gray-500 text-xs mb-2 uppercase tracking-widest">#<?= $player['jersey_number'] ?> · <?= $player['position'] ?></p>
                <p class="font-black text-xl uppercase group-hover:text-blue-400 transition"><?= $player['first_name'] ?> <span class="text-gray-300"><?= $player['last_name'] ?></span></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>