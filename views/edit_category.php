<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Catégorie - SunuActu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto Flex', sans-serif;
            background-color: #f3f4f6; /* Couleur de fond */
        }
    </style>
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-neutral-800/60">Modifier la Catégorie : <?= $libelle ?></h1>
        <form action="/update_category" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-4">
                <label for="libelle" class="block text-gray-700 text-sm font-bold mb-2">Nouveau Libellé de la Catégorie</label>
                <input type="text" id="libelle" name="libelle" value="<?= $libelle ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Modifier
                </button>
            </div>
        </form>
    </div>
</body>
</html>