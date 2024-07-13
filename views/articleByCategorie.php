<?php
// Inclusion du header
include 'views/header.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($categorie->libelle) ?> - SunuActu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-green-700"><?= htmlspecialchars($categorie->libelle) ?></h1>

        <section id="articles" class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php if (!empty($articles)) : ?>
                <?php foreach ($articles as $article) : ?>
                    <article class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2 text-green-600"><a href="/article/<?= $article->id ?>" class="hover:text-green-600"><?= htmlspecialchars($article->titre) ?></a></h2>
                            <p class="text-gray-600"><?= substr(htmlspecialchars($article->contenu), 0, 300) . '...' ?></p>
                            <div class="mt-4 flex justify-end">
                                <a href="/article/<?= $article->id ?>" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Lire la suite</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="message text-center text-gray-600">Aucun article trouvé pour cette catégorie.</div>
            <?php endif; ?>
        </section>
    </div>

    <?php
    // Inclusion du footer ou autre contenu
    ?>
</body>

</html>
