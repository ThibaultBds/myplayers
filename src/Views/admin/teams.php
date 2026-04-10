<?php ob_start(); ?>

<section class="px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-blue-500 text-xs font-bold uppercase tracking-widest mb-1">Admin</p>
            <h1 class="text-3xl font-black uppercase">Gestion des équipes</h1>
        </div>
        <a href="/admin/teams/create" class="bg-blue-600 hover:bg-blue-500 px-5 py-2 text-sm font-bold uppercase tracking-widest rounded transition">
            + Ajouter une équipe
        </a>
    </div>

    <div class="bg-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-900 text-gray-400 uppercase text-xs tracking-widest">
                <tr>
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-left">Nom</th>
                    <th class="px-6 py-4 text-left">Conférence</th>
                    <th class="px-6 py-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($teams as $team): ?>
                    <tr class="hover:bg-gray-700 transition">
                        <td class="px-6 py-4 text-gray-400"><?= $team['id'] ?></td>
                        <td class="px-6 py-4 font-bold"><?= htmlspecialchars($team['name']) ?></td>
                        <td class="px-6 py-4 text-gray-400"><?= htmlspecialchars($team['conference']) ?></td>
                        <td class="px-6 py-4 flex gap-3">
                            <a href="/admin/teams/<?= $team['id'] ?>/edit" class="text-blue-400 hover:text-blue-300 font-semibold transition">Modifier</a>
                            <form method="POST" action="/admin/teams/<?= $team['id'] ?>/delete" onsubmit="return confirm('Supprimer cette équipe ?')">
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
