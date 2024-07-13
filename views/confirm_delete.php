<!-- confirm_delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Suppression - SunuActu</title>
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
    <h1 class="text-3xl font-bold mb-6 text-neutral-800/60">Confirmation de Suppression</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <p class="text-gray-700 text-lg mb-4">Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.</p>
        
        <form action="/delete_category/<?= $id ?>" method="POST">
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Confirmer la Suppression
                </button>
                <a href="/list_categories" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
