<?php ob_start(); ?>

<section class="relative px-8 py-20 bg-gray-900 overflow-hidden">
    <div class="relative z-10 max-w-xl">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-4">Season 2024-25</p>
        <h1 class="text-7xl font-black uppercase leading-none">THE<br>ELITE<br><span class="text-blue-500">ROSTER</span></h1>
        <p class="mt-6 text-gray-400 text-lg">Track the performance of the world's greatest NBA athletes.</p>
    </div>
</section>

<section class="px-8 py-12">

    <!-- FILTRES -->
    <form method="GET" action="/players" class="flex flex-wrap gap-4 mb-10 items-end">

        <div class="flex flex-col gap-2">
            <label class="text-gray-400 text-xs uppercase tracking-widest">Recherche</label>
            <input type="text" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Nom du joueur..."
                class="bg-gray-800 border border-gray-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-gray-400 text-xs uppercase tracking-widest">Poste</label>
            <select name="position" class="bg-gray-800 border border-gray-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                <option value="">Tous les postes</option>
                <?php foreach (['PG', 'SG', 'SF', 'PF', 'C'] as $pos): ?>
                    <option value="<?= $pos ?>" <?= $position === $pos ? 'selected' : '' ?>><?= $pos ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-gray-400 text-xs uppercase tracking-widest">Équipe</label>
            <select name="team_id" class="bg-gray-800 border border-gray-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                <option value="">Toutes les équipes</option>
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id'] ?>" <?= $team_id === $team['id'] ? 'selected' : '' ?>><?= htmlspecialchars($team['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-6 py-2 text-sm font-bold uppercase tracking-widest rounded-lg transition">
            Filtrer
        </button>

        <?php if ($q || $position || $team_id): ?>
            <a href="/players" class="text-gray-400 hover:text-white text-sm py-2 transition">Réinitialiser</a>
        <?php endif; ?>

    </form>

    <!-- RÉSULTATS -->
    <div class="mb-4">
        <p class="text-gray-500 text-sm"><?= count($players) ?> joueur<?= count($players) > 1 ? 's' : '' ?> trouvé<?= count($players) > 1 ? 's' : '' ?></p>
    </div>

    <?php if (empty($players)): ?>
        <div class="text-center py-20">
            <p class="text-gray-500 text-lg">Aucun joueur ne correspond à votre recherche.</p>
            <a href="/players" class="text-blue-400 hover:text-blue-300 text-sm mt-4 inline-block transition">Réinitialiser les filtres</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-4 gap-4">
            <?php foreach ($players as $player): ?>
                <a href="/players/<?= $player['id'] ?>" class="bg-gray-800 p-6 h-52 flex flex-col justify-end rounded-xl hover:bg-gray-700 hover:ring-1 hover:ring-blue-500 transition group">
                    <?php if (!empty($player['team_name'])): ?>
                        <p class="text-blue-500 text-xs uppercase tracking-widest mb-1"><?= htmlspecialchars($player['team_name']) ?></p>
                    <?php endif; ?>
                    <p class="text-gray-500 text-xs mb-2 uppercase tracking-widest">#<?= $player['jersey_number'] ?> · <?= $player['position'] ?></p>
                    <p class="font-black text-xl uppercase group-hover:text-blue-400 transition"><?= htmlspecialchars($player['first_name']) ?> <span class="text-gray-300"><?= htmlspecialchars($player['last_name']) ?></span></p>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
