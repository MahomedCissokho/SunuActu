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

<?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin' || $_SESSION['user']['role'] === 'editeur')) : ?>
    <nav class="bg-gray-200 py-7 px-4 mb-4">
        <ul class="flex justify-center gap-10 items-center ">
            <li><a href="/add_article" class="duration-300 transition-all ease-out text-white hover:text-green-400 hover:bg-white bg-green-400 rounded-lg px-3 py-4 font-semibold ">Nouvel Article</a></li>
            <li><a href="/add_category" class="duration-300 transition-all ease-out text-white hover:text-green-400 hover:bg-white bg-green-400 rounded-lg px-3 py-4 font-semibold">Nouvelle Catégorie</a></li>
            <li><a href="/list_categories" class="duration-300 transition-all ease-out text-white hover:text-green-400 hover:bg-white bg-green-400 rounded-lg px-3 py-4 font-semibold">Liste des Catégories</a></li>
        </ul>
    </nav>
    <?php endif; ?>
<h1 class="text-3xl font-bold text-center mt-10 mb-5 text-green-500">Votre Site d'Actualité N°1 au Sénégal</h1>

<section id="articles" class="container max-w-6xl mx-auto">
    <?php if (!empty($articles)) : ?>
        <?php foreach ($articles as $article) : ?>
            <article class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2 text-green-600"><a href="/article/<?= $article->id ?>" class="hover:text-green-500"><?= htmlspecialchars($article->titre) ?></a></h2>
                    <p class="text-gray-600"><?= htmlspecialchars(substr($article->contenu, 0, 150)) . '...' ?></p>
                    <div class="mt-4 flex justify-end">
                        <a href="/article/<?= $article->id ?>" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Lire la suite</a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>

        <!-- Pagination -->
        <div class="pagination mt-5 flex justify-center items-center space-x-4">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Précédent</a>
            <?php endif; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Suivant</a>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <div class="message text-center mt-5">Aucun article trouvé</div>
    <?php endif; ?>
</section> 

<?php
// Inclusion du footer ou autre contenu
?>
