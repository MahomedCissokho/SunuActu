<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-5">Modifier l'Article</h1>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="/update_article" method="POST">
                <input type="hidden" name="id" value="<?= $article->id ?>">
                <div class="mb-4">
                    <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($article->titre) ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="contenu" class="block text-sm font-medium text-gray-700">Contenu</label>
                    <textarea id="contenu" name="contenu" rows="10" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"><?= htmlspecialchars($article->contenu) ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <input type="text" id="categorie" name="categorie" value="<?= htmlspecialchars($article->categorie) ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Mettre à jour</button>
            </form>
        </div>
    </div>
</body>
</html>
