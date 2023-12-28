<?php require "views/includes/head.php" ?>

<?php require "views/includes/nav.php" ?>

<?php require "views/includes/barner.php" ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach($posts as $post) : ?>
            <li>
                <a href="/post?id=<?= $post['id'] ?>" class="text-blue-500 hover:underline">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-5">
            <a href="/posts/create" class="bg-slate-500 py-1 px-2 text-white rounded-lg">create post</a>
        </p>
    </div>
</main>

<?php require "views/includes/foot.php" ?>
