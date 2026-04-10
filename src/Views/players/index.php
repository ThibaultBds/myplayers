<?php ob_start(); ?>

<!-- HERO -->
<section class="relative px-8 py-20 bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900 to-transparent z-0"></div>
    <div class="relative z-10 max-w-xl">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-4">Season 2024-25</p>
        <h1 class="text-7xl font-black uppercase leading-none">THE<br>ELITE<br><span class="text-blue-500">ROSTER</span></h1>
        <p class="mt-6 text-gray-400 text-lg">Track the performance of the world's greatest NBA athletes.</p>
    </div>
</section>

<!-- STATS BAR -->
<section class="px-8 py-8 bg-gray-800 border-y border-gray-700">
    <div class="flex gap-12">
        <div>
            <p class="text-4xl font-black text-white"><?= $totalPlayers ?></p>
            <p class="text-gray-400 text-xs uppercase tracking-widest mt-1">Joueurs</p>
        </div>
        <div class="w-px bg-gray-700"></div>
        <div>
            <p class="text-4xl font-black text-white"><?= $totalTeams ?></p>
            <p class="text-gray-400 text-xs uppercase tracking-widest mt-1">Équipes</p>
        </div>
        <div class="w-px bg-gray-700"></div>
        <div>
            <p class="text-4xl font-black text-white"><?= $totalGames ?></p>
            <p class="text-gray-400 text-xs uppercase tracking-widest mt-1">Matchs enregistrés</p>
        </div>
    </div>
</section>

<!-- TOP SCORERS -->
<?php if (!empty($topScorers)): ?>
<section class="px-8 py-12">
    <div class="mb-8">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-1">Classement</p>
        <h2 class="text-3xl font-black uppercase">Top Scorers</h2>
    </div>
    <div class="bg-gray-800 rounded-xl overflow-hidden mb-12">
        <table class="w-full text-sm">
            <thead class="bg-gray-900 text-gray-400 uppercase text-xs tracking-widest">
                <tr>
                    <th class="px-6 py-4 text-left">Joueur</th>
                    <th class="px-6 py-4 text-center">PPG</th>
                    <th class="px-6 py-4 text-center">RPG</th>
                    <th class="px-6 py-4 text-center">APG</th>
                    <th class="px-6 py-4 text-center">GP</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($topScorers as $i => $player): ?>
                    <tr class="hover:bg-gray-700 transition">
                        <td class="px-6 py-4">
                            <a href="/players/<?= $player['id'] ?>" class="flex items-center gap-4 group">
                                <span class="text-gray-600 font-black text-lg w-6"><?= $i + 1 ?></span>
                                <div>
                                    <p class="font-black uppercase group-hover:text-blue-400 transition"><?= htmlspecialchars($player['first_name']) ?> <?= htmlspecialchars($player['last_name']) ?></p>
                                    <p class="text-gray-500 text-xs">#<?= $player['jersey_number'] ?> · <?= $player['position'] ?></p>
                                </div>
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center font-black text-blue-400"><?= $player['ppg'] ?></td>
                        <td class="px-6 py-4 text-center text-gray-300"><?= $player['rpg'] ?></td>
                        <td class="px-6 py-4 text-center text-gray-300"><?= $player['apg'] ?></td>
                        <td class="px-6 py-4 text-center text-gray-500"><?= $player['games_played'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php endif; ?>

<!-- PLAYERS GRID -->
<section class="px-8 pb-12">
    <div class="mb-8">
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-1">Tous les joueurs</p>
        <h2 class="text-3xl font-black uppercase">Roster complet</h2>
    </div>
    <div class="grid grid-cols-4 gap-4">
        <?php foreach ($players as $player): ?>
            <a href="/players/<?= $player['id'] ?>" class="bg-gray-800 p-6 h-52 flex flex-col justify-end rounded-xl hover:bg-gray-700 hover:ring-1 hover:ring-blue-500 transition group">
                <p class="text-gray-500 text-xs mb-2 uppercase tracking-widest">#<?= $player['jersey_number'] ?> · <?= $player['position'] ?></p>
                <p class="font-black text-xl uppercase group-hover:text-blue-400 transition"><?= htmlspecialchars($player['first_name']) ?> <span class="text-gray-300"><?= htmlspecialchars($player['last_name']) ?></span></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
