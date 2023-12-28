<?php require base_path("views/includes/head.php") ?>

<?php require base_path("views/includes/nav.php") ?>

<?php require base_path("views/includes/barner.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <a href="/posts" class="mb-5 text-blue-500 hover:underline active:underline block">See all my posts</a>

        <?= htmlspecialchars($post['title']) ?>

    </div>
</main>

<?php require base_path("views/includes/foot.php") ?>
