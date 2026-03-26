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
    <nav class="flex justify-between items-center px-8 py-4 bg-gray-900">
        <span class="text-white fond-bold text-xl">MyPlayers</span>

        <div class="flex gap-6">
            <a href="/" class="text-white">HOME</a>
            <a href="/players" class="text-white">PLAYERS</a>
            <a href="/teams" class="text-white">TEAMS</a>
        </div>

        <a href="/admin" class="bg-blue-600 px-4 py-2 text-white">ADMIN</a>

    </nav>

    <!-- CONTENU -->
    <main>
        <?php echo $content ?? ''; ?>
    </main>

</body>

</html>