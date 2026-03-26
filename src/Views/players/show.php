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
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
