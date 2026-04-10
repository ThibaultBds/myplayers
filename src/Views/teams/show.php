<?php ob_start(); ?>

<!-- HERO -->
<section class="relative px-8 py-20 bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900 to-transparent z-0"></div>
    <div class="relative z-10 max-w-xl">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-4"><?= htmlspecialchars($team['conference']) ?> Conference</p>
        <h1 class="text-7xl font-black uppercase leading-none"><?= htmlspecialchars($team['name']) ?></h1>
    </div>
</section>

<!-- ROSTER -->
<section class="px-8 py-12">
    <div class="flex items-center gap-4 mb-6">
        <div class="w-1 h-8 bg-blue-500 rounded-full"></div>
        <h2 class="text-2xl font-black uppercase">Roster</h2>
    </div>

    <?php if (empty($players)): ?>
        <p class="text-gray-500">Aucun joueur enregistré pour cette équipe.</p>
    <?php else: ?>
        <div class="bg-gray-800 border border-gray-700 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-900 text-gray-400 uppercase text-xs tracking-widest">
                    <tr>
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Joueur</th>
                        <th class="px-6 py-4 text-left">Position</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php foreach ($players as $player): ?>
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-gray-400 font-black">#<?= $player['jersey_number'] ?></td>
                            <td class="px-6 py-4 font-bold">
                                <a href="/players/<?= $player['id'] ?>" class="hover:text-blue-400 transition">
                                    <?= htmlspecialchars($player['first_name']) ?> <?= htmlspecialchars($player['last_name']) ?>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-gray-400"><?= htmlspecialchars($player['position']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../Views/layouts/base.php';
?>
