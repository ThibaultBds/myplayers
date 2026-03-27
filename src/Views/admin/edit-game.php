<?php ob_start(); ?>

<section class="px-8 py-10 max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="/admin/games" class="inline-flex items-center gap-2 text-gray-400 hover:text-white text-sm transition">
            ← Retour à la liste
        </a>
        <div class="mt-6 flex items-center gap-4">
            <div class="w-1 h-10 bg-blue-500 rounded-full"></div>
            <div>
                <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-0.5">Admin</p>
                <h1 class="text-3xl font-black uppercase">Modifier un match</h1>
            </div>
        </div>
    </div>

    <form action="/admin/games/<?= $game['id'] ?>/edit" method="POST" class="bg-gray-800 border border-gray-700 rounded-2xl p-8 flex flex-col gap-8">

        <div>
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-4 border-b border-gray-700 pb-2">Joueur & Date</p>
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Joueur</label>
                    <select name="player_id" required class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                        <?php foreach ($players as $player): ?>
                            <option value="<?= $player['id'] ?>" <?= $game['player_id'] == $player['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($player['first_name']) ?> <?= htmlspecialchars($player['last_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Date</label>
                    <input type="date" name="date" required value="<?= $game['date'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
            </div>
        </div>

        <div>
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-4 border-b border-gray-700 pb-2">Équipes</p>
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Équipe domicile</label>
                    <select name="home_team_id" required class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                        <?php foreach ($teams as $team): ?>
                            <option value="<?= $team['id'] ?>" <?= $game['home_team_id'] == $team['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($team['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Équipe extérieur</label>
                    <select name="away_team_id" required class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                        <?php foreach ($teams as $team): ?>
                            <option value="<?= $team['id'] ?>" <?= $game['away_team_id'] == $team['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($team['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div>
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-4 border-b border-gray-700 pb-2">Score</p>
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Score domicile</label>
                    <input type="number" name="score_team" min="0" required value="<?= $game['score_team'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Score extérieur</label>
                    <input type="number" name="score_opponent" min="0" required value="<?= $game['score_opponent'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
            </div>
        </div>

        <div>
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-4 border-b border-gray-700 pb-2">Stats du joueur</p>
            <div class="grid grid-cols-4 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Points</label>
                    <input type="number" name="points" min="0" required value="<?= $game['points'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Rebonds</label>
                    <input type="number" name="rebounds" min="0" required value="<?= $game['rebounds'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Passes</label>
                    <input type="number" name="assists" min="0" required value="<?= $game['assists'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Minutes</label>
                    <input type="number" name="minute_played" min="0" max="48" required value="<?= $game['minute_played'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-700">
            <a href="/admin/games" class="text-gray-400 hover:text-white text-sm transition">Annuler</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold uppercase tracking-widest px-8 py-3 rounded-lg transition">
                Enregistrer
            </button>
        </div>

    </form>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
