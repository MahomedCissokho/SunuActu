<?php include 'views/header.php'; ?>

<?php foreach ($categories as $categorie) : ?>
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6 max-w-6xl mx-auto mt-5">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2 text-green-600"><?= htmlspecialchars($categorie->libelle) ?></h2>
            <div class="mt-4 flex justify-end space-x-4">
                <a href="/categorie/<?= $categorie->id ?>" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Voir Articles</a>
                <a href="/edit_category/<?= $categorie->id ?>" class="btn bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Modifier</a>
                <a href="/confirm_delete_category/<?= $categorie->id ?>" class="btn bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Supprimer</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>