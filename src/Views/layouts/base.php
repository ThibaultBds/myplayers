<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPlayers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white">

    <!-- NAVBAR -->
    <nav class="flex justify-between items-center px-8 py-4 bg-gray-900 border-b border-gray-800">
        <a href="/" class="text-white font-black text-xl tracking-tight">My<span class="text-blue-500">Players</span></a>

        <div class="flex gap-8">
            <a href="/" class="text-gray-400 hover:text-white text-sm font-semibold uppercase tracking-widest transition">Home</a>
            <a href="/players" class="text-gray-400 hover:text-white text-sm font-semibold uppercase tracking-widest transition">Players</a>
            <a href="/teams" class="text-gray-400 hover:text-white text-sm font-semibold uppercase tracking-widest transition">Teams</a>
        </div>

        <a href="/admin" class="bg-blue-600 hover:bg-blue-500 px-5 py-2 text-white text-sm font-bold uppercase tracking-widest rounded transition">Admin</a>
    </nav>

    <!-- CONTENU -->
    <main>
        <?php echo $content ?? ''; ?>
    </main>

</body>

</html>