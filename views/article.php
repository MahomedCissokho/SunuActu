<?php
// Inclusion du header
include 'views/header.php';
?>
<script src="https://cdn.tailwindcss.com"></script>
<!-- Add Tailwind CSS and Google Fonts -->

<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto Flex', sans-serif;
        background-color: #f3f4f6; /* Couleur de fond */
    }
</style>

<article class="container max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6 mt-10">
    <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($article->titre) ?></h1>
    <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($article->contenu)) ?></p>

    <?php if (isset($_SESSION['user'])) : ?>
        <div class="flex justify-end mt-4">
            <a href="/modifier-article/<?= $article->id ?>" class="btn bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md mr-2">Modifier</a>
            <a href="/supprimer-article/<?= $article->id ?>" class="btn bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Supprimer</a>
        </div>
    <?php endif; ?>
</article>

<?php
// Inclusion du footer ou autre contenu
?>
