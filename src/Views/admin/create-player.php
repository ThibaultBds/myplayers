<?php ob_start(); ?>

<section class="px-8 py-10 max-w-2xl">
    <div class="mb-8">
        <a href="/admin/players" class="text-gray-400 hover:text-white text-sm transition">← Retour</a>
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mt-4 mb-1">Admin</p>
        <h1 class="text-3xl font-black uppercase">Ajouter un joueur</h1>
    </div>

    <form action="/admin/players/create" method="POST" class="bg-gray-800 rounded-xl p-8 flex flex-col gap-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Prénom</label>
                <input type="text" name="first_name" required
                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Nom</label>
                <input type="text" name="last_name" required
                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Poste</label>
                <select name="position" required
                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">-- Choisir --</option>
                    <option value="PG">PG - Point Guard</option>
                    <option value="SG">SG - Shooting Guard</option>
                    <option value="SF">SF - Small Forward</option>
                    <option value="PF">PF - Power Forward</option>
                    <option value="C">C - Center</option>
                </select>
            </div>
            <div>
                <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Numéro</label>
                <input type="number" name="jersey_number" min="0" max="99" required
                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Équipe</label>
            <select name="team_id" required class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="">-- Choisir une équipe --</option>
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id'] ?>"><?= htmlspecialchars($team['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold uppercase tracking-widest py-3 rounded-lg transition">
            Ajouter le joueur
        </button>
    </form>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
