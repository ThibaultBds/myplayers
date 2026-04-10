<?php ob_start(); ?>

<section class="px-8 py-10 max-w-2xl">
    <div class="mb-8">
        <a href="/admin/teams" class="text-gray-400 hover:text-white text-sm transition">← Retour</a>
        <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mt-4 mb-1">Admin</p>
        <h1 class="text-3xl font-black uppercase">Ajouter une équipe</h1>
    </div>

    <form action="/admin/teams/create" method="POST" class="bg-gray-800 rounded-xl p-8 flex flex-col gap-6">
        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Nom</label>
            <input type="text" name="name" required
                class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Conférence</label>
            <select name="conference" required
                class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="">-- Choisir --</option>
                <option value="East">East</option>
                <option value="West">West</option>
            </select>
        </div>

        <div>
            <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Logo (URL)</label>
            <input type="text" name="logo"
                class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold uppercase tracking-widest py-3 rounded-lg transition">
            Ajouter l'équipe
        </button>
    </form>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
