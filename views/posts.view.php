<?php require "includes/head.php" ?>

<?php require "includes/nav.php" ?>

<?php require "includes/barner.php" ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach($posts as $post) : ?>
        <li>
            <a href="/post?id=<?= $post['id'] ?>" class="text-blue-500 hover:underline">
                <?= $post['title'] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </div>
</main>

<?php require "includes/foot.php" ?>
