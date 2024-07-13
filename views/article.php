<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article->titre) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include 'views/header.php'; ?>
    <article class="container mx-auto max-w-6xl mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-5 text-green-500"><?= htmlspecialchars($article->titre) ?></h1>
        <p><?= nl2br(htmlspecialchars($article->contenu)) ?></p>
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="flex justify-end mt-5 space-x-2">
                <a href="/edit_article/<?= $article->id ?>" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md">Modifier</a>
                <form action="/delete_article" method="POST" class="inline-block">
                    <input type="hidden" name="id" value="<?= $article->id ?>">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md">Supprimer</button>
                </form>
            </div>
        <?php endif; ?>
    </article>
</body>
</html>
