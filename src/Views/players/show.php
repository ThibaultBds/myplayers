<?php ob_start(); ?>

<section class="px-8 py-16">
    <div class="flex gap-12 items-start">

        <!-- Photo -->
        <div class="w-64 h-80 bg-gray-800 rounded-xl flex items-center justify-center flex-shrink-0">
            <?php if ($player['photo']): ?>
                <img src="/uploads/<?= htmlspecialchars($player['photo']) ?>" class="w-full h-full object-cover rounded-xl">
            <?php else: ?>
                <span class="text-gray-600 text-6xl font-black"><?= strtoupper(substr($player['first_name'], 0, 1)) ?></span>
            <?php endif; ?>
        </div>

        <!-- Infos -->
        <div class="flex-1">
            <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-2"><?= htmlspecialchars($player['position']) ?></p>
            <h1 class="text-6xl font-black uppercase leading-none">
                <?= htmlspecialchars($player['first_name']) ?><br>
                <span class="text-gray-400"><?= htmlspecialchars($player['last_name']) ?></span>
            </h1>

            <div class="flex gap-8 mt-10">
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-widest mb-1">Numéro</p>
                    <p class="text-2xl font-black">#<?= $player['jersey_number'] ?></p>
                </div>
                <div>
                    <p class="text-gray-500 text-xs uppercase tracking-widest mb-1">Position</p>
                    <p class="text-2xl font-black"><?= htmlspecialchars($player['position']) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Historique des matchs -->
    <div class="mt-16">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-1 h-8 bg-blue-500 rounded-full"></div>
            <h2 class="text-xl font-black uppercase">Historique des matchs</h2>
        </div>

        <?php if (empty($games)): ?>
            <p class="text-gray-500">Aucun match enregistré.</p>
        <?php else: ?>
            <div class="bg-gray-800 border border-gray-700 rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-900 text-gray-400 uppercase text-xs tracking-widest">
                        <tr>
                            <th class="px-6 py-4 text-left">Date</th>
                            <th class="px-6 py-4 text-left">Score</th>
                            <th class="px-6 py-4 text-center">PTS</th>
                            <th class="px-6 py-4 text-center">REB</th>
                            <th class="px-6 py-4 text-center">AST</th>
                            <th class="px-6 py-4 text-center">MIN</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <?php foreach ($games as $game): ?>
                            <tr class="hover:bg-gray-700 transition">
                                <td class="px-6 py-4 text-gray-400"><?= $game['date'] ?></td>
                                <td class="px-6 py-4 text-gray-400"><?= $game['score_team'] ?> - <?= $game['score_opponent'] ?></td>
                                <td class="px-6 py-4 text-center font-bold text-white"><?= $game['points'] ?></td>
                                <td class="px-6 py-4 text-center text-gray-400"><?= $game['rebounds'] ?></td>
                                <td class="px-6 py-4 text-center text-gray-400"><?= $game['assists'] ?></td>
                                <td class="px-6 py-4 text-center text-gray-400"><?= $game['minute_played'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
