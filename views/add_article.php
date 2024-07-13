<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article - SunuActu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto Flex', sans-serif;
            background-color: #f3f4f6; 
        }
    </style>
</head>
<body>
<?php include 'views/header.php'; ?>
    <div class="container max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Ajouter un Nouvel Article</h1>
        <form action="/store" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                <input type="text" id="titre" name="titre" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="contenu" class="block text-gray-700 text-sm font-bold mb-2">Contenu</label>
                <textarea id="contenu" name="contenu" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="10"></textarea>
            </div>
            <div class="mb-4">
                <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Catégorie</label>
                <select id="categorie" name="categorie" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <?php foreach ($categories as $cat) : ?>
                        <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->libelle) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</body>
</html>
