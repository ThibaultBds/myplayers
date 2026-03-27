<?php ob_start(); ?>

<section class="px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-1">Admin</p>
            <h1 class="text-3xl font-black uppercase">Gestion des matchs</h1>
        </div>
        <a href="/admin/games/create" class="bg-blue-600 hover:bg-blue-500 px-5 py-2 text-sm font-bold uppercase tracking-widest rounded transition">
            + Ajouter un match
        </a>
    </div>

    <div class="bg-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-900 text-gray-400 uppercase text-xs tracking-widest">
                <tr>
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-left">Joueur</th>
                    <th class="px-6 py-4 text-left">Date</th>
                    <th class="px-6 py-4 text-left">Score</th>
                    <th class="px-6 py-4 text-left">Pts</th>
                    <th class="px-6 py-4 text-left">Reb</th>
                    <th class="px-6 py-4 text-left">Ast</th>
                    <th class="px-6 py-4 text-left">Min</th>
                    <th class="px-6 py-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($games as $game): ?>
                    <tr class="hover:bg-gray-700 transition">
                        <td class="px-6 py-4 text-gray-400"><?= $game['id'] ?></td>
                        <td class="px-6 py-4 font-bold"><?= htmlspecialchars($game['first_name']) ?> <?= htmlspecialchars($game['last_name']) ?></td>
                        <td class="px-6 py-4 text-gray-400"><?= $game['date'] ?></td>
                        <td class="px-6 py-4 text-gray-400"><?= $game['score_team'] ?> - <?= $game['score_opponent'] ?></td>
                        <td class="px-6 py-4 text-white font-semibold"><?= $game['points'] ?></td>
                        <td class="px-6 py-4 text-gray-400"><?= $game['rebounds'] ?></td>
                        <td class="px-6 py-4 text-gray-400"><?= $game['assists'] ?></td>
                        <td class="px-6 py-4 text-gray-400"><?= $game['minute_played'] ?></td>
                        <td class="px-6 py-4 flex gap-3">
                            <a href="/admin/games/<?= $game['id'] ?>/edit" class="text-blue-400 hover:text-blue-300 font-semibold transition">Modifier</a>
                            <form method="POST" action="/admin/games/<?= $game['id'] ?>/delete" onsubmit="return confirm('Supprimer ce match ?')">
                                <button type="submit" class="text-red-400 hover:text-red-300 font-semibold transition">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
