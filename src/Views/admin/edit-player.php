<?php ob_start(); ?>

<section class="px-8 py-10 max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="/admin/players" class="inline-flex items-center gap-2 text-gray-400 hover:text-white text-sm transition">
            ← Retour à la liste
        </a>
        <div class="mt-6 flex items-center gap-4">
            <div class="w-1 h-10 bg-blue-500 rounded-full"></div>
            <div>
                <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-0.5">Admin</p>
                <h1 class="text-3xl font-black uppercase">Modifier un joueur</h1>
            </div>
        </div>
    </div>

    <form action="/admin/players/<?= $player['id'] ?>/edit" method="POST" class="bg-gray-800 border border-gray-700 rounded-2xl p-8 flex flex-col gap-8">

        <div>
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-4 border-b border-gray-700 pb-2">Identité</p>
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Prénom</label>
                    <input type="text" name="first_name" required value="<?= htmlspecialchars($player['first_name']) ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Nom</label>
                    <input type="text" name="last_name" required value="<?= htmlspecialchars($player['last_name']) ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
            </div>
        </div>

        <div>
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-4 border-b border-gray-700 pb-2">Informations</p>
            <div class="grid grid-cols-3 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Poste</label>
                    <select name="position" required
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                        <?php foreach (['PG' => 'PG — Point Guard', 'SG' => 'SG — Shooting Guard', 'SF' => 'SF — Small Forward', 'PF' => 'PF — Power Forward', 'C' => 'C — Center'] as $val => $label): ?>
                            <option value="<?= $val ?>" <?= $player['position'] === $val ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Numéro</label>
                    <input type="number" name="jersey_number" min="0" max="99" required value="<?= $player['jersey_number'] ?>"
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-gray-400 text-xs uppercase tracking-widest">Équipe</label>
                    <select name="team_id" required
                        class="bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                        <?php foreach ($teams as $team): ?>
                            <option value="<?= $team['id'] ?>" <?= $player['team_id'] == $team['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($team['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-700">
            <a href="/admin/players" class="text-gray-400 hover:text-white text-sm transition">Annuler</a>
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
