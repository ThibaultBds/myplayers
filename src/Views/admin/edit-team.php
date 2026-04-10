<?php ob_start(); ?>

<section class="px-8 py-10 max-w-2xl">
    <div class="mb-8">
        <a href="/admin/teams" class="text-gray-400 hover:text-white text-sm transition">← Retour</a>
        <div class="mt-6 flex items-center gap-4">
            <div class="w-1 h-10 bg-blue-500 rounded-full"></div>
            <div>
                <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-0.5">Admin</p>
                <h1 class="text-3xl font-black uppercase">Modifier une équipe</h1>
            </div>
        </div>
    </div>

    <form action="/admin/teams/<?= $team['id'] ?>/edit" method="POST" class="bg-gray-800 border border-gray-700 rounded-2xl p-8 flex flex-col gap-6">
        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Nom</label>
            <input type="text" name="name" required value="<?= htmlspecialchars($team['name']) ?>"
                class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
        </div>

        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Conférence</label>
            <select name="conference" required
                class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                <option value="East" <?= $team['conference'] === 'East' ? 'selected' : '' ?>>East</option>
                <option value="West" <?= $team['conference'] === 'West' ? 'selected' : '' ?>>West</option>
            </select>
        </div>

        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Logo (URL)</label>
            <input type="text" name="logo" value="<?= htmlspecialchars($team['logo'] ?? '') ?>"
                class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
        </div>

        <div class="flex items-center justify-between pt-2 border-t border-gray-700">
            <a href="/admin/teams" class="text-gray-400 hover:text-white text-sm transition">Annuler</a>
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
