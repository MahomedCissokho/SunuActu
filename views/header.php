
<script src="https://cdn.tailwindcss.com"></script>
<!-- Add Tailwind CSS and Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto Flex', sans-serif;
        background-color: #f3f4f6; /* Couleur de fond */
    }
</style>
<div class="bg-green-600 flex items-center justify-between px-10 py-3">
    <h1 class="text-2xl font-bold text-white">SunuActu</h1>
    <header>
        <nav>
            <ul class="flex items-center justify-center gap-5">
                <li><a href="/" class="text-white py-2 px-4 rounded-md hover:bg-white hover:text-green-500 transition-all ease-in duration-300">Accueil</a></li>
                <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $cat) : ?>
                        <li><a href="/categorie/<?= $cat->id ?>" class="text-white py-2 px-4 rounded-md hover:bg-white hover:text-green-500 transition-all ease-in duration-300"><?= htmlspecialchars($cat->libelle) ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="flex items-center justify-center gap-5">
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="/logout" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md hover:bg-white hover:text-green-500 transition-all ease-in duration-300">Déconnexion</a>
            <span class="text-white font-bold bg-neutral-800/20 rounded-full p-2"><?= $_SESSION['user']['role'] ?></span>
        <?php else : ?>
            <a href="/login" class="btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Connexion</a>
        <?php endif; ?>
    </div>
</div>
