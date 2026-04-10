<?php ob_start(); ?>

<section class="px-8 py-10">
    <div class="mb-10">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-1">Admin</p>
        <h1 class="text-3xl font-black uppercase">Dashboard</h1>
    </div>

    <div class="grid grid-cols-2 gap-6 max-w-2xl">
        <a href="/admin/players" class="bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-2xl p-6 transition group">
            <p class="text-gray-400 text-xs uppercase tracking-widest mb-2">Gestion</p>
            <h2 class="text-xl font-black uppercase group-hover:text-blue-400 transition">Joueurs</h2>
        </a>
        <a href="/admin/games" class="bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-2xl p-6 transition group">
            <p class="text-gray-400 text-xs uppercase tracking-widest mb-2">Gestion</p>
            <h2 class="text-xl font-black uppercase group-hover:text-blue-400 transition">Matchs</h2>
        </a>
        <a href="/admin/teams" class="bg-gray-800 border border-gray-700 hover:border-blue-500 rounded-2xl p-6 transition group">
            <p class="text-gray-400 text-xs uppercase tracking-widest mb-2">Gestion</p>
            <h2 class="text-xl font-black uppercase group-hover:text-blue-400 transition">Équipes</h2>
        </a>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
