<?php ob_start(); ?>

<section class="min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-10 rounded-xl w-full max-w-md">
        <h1 class="text-3xl font-black uppercase mb-2">Admin <span class="text-blue-500">Login</span></h1>
        <p class="text-gray-400 text-sm mb-8">Accès réservé aux administrateurs.</p>

        <?php if (!empty($error)): ?>
            <p class="bg-red-900 text-red-300 px-4 py-3 rounded mb-6 text-sm"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form action="/login" method="post" class="flex flex-col gap-5">
            <div>
                <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Email</label>
                <input type="email" name="email" required placeholder="admin@myplayers.com"
                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="text-gray-400 text-xs uppercase tracking-widest mb-2 block">Mot de passe</label>
                <input type="password" name="password" required placeholder="••••••••"
                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold uppercase tracking-widest py-3 rounded-lg transition mt-2">
                Se connecter
            </button>
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>