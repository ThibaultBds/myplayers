<?php ob_start(); ?>

<!-- HERO -->
<section class="relative px-8 py-20 bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900 to-transparent z-0"></div>
    <div class="relative z-10 max-w-xl">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-4">Season 2024-25</p>
        <h1 class="text-7xl font-black uppercase leading-none">THE<br>NBA<br><span class="text-blue-500">TEAMS</span></h1>
        <p class="mt-6 text-gray-400 text-lg">All 30 franchises, two conferences, one championship.</p>
    </div>
</section>

<!-- EAST -->
<?php $east = array_filter($teams, fn($t) => $t['conference'] === 'East'); ?>
<?php $west = array_filter($teams, fn($t) => $t['conference'] === 'West'); ?>

<section class="px-8 py-12">

    <?php if (!empty($east)): ?>
    <div class="mb-12">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-1 h-8 bg-blue-500 rounded-full"></div>
            <h2 class="text-2xl font-black uppercase">Conférence Est</h2>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <?php foreach ($east as $team): ?>
                <a href="/teams/<?= $team['id'] ?>" class="bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-2xl p-6 transition group">
                    <p class="text-gray-500 text-xs uppercase tracking-widest mb-2">Est</p>
                    <p class="font-black text-xl uppercase group-hover:text-blue-400 transition"><?= htmlspecialchars($team['name']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($west)): ?>
    <div>
        <div class="flex items-center gap-4 mb-6">
            <div class="w-1 h-8 bg-blue-500 rounded-full"></div>
            <h2 class="text-2xl font-black uppercase">Conférence Ouest</h2>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <?php foreach ($west as $team): ?>
                <a href="/teams/<?= $team['id'] ?>" class="bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-2xl p-6 transition group">
                    <p class="text-gray-500 text-xs uppercase tracking-widest mb-2">Ouest</p>
                    <p class="font-black text-xl uppercase group-hover:text-blue-400 transition"><?= htmlspecialchars($team['name']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../Views/layouts/base.php';
?>
