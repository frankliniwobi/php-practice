<?php require base_path("views/includes/head.php") ?>

<?php require base_path("views/includes/nav.php") ?>

<?php require base_path("views/includes/barner.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <a href="/posts" class="mb-5 text-blue-500 hover:underline active:underline block">See all my posts</a>

        <?= htmlspecialchars($post['title']) ?>

        <form class="mt-6" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="text-sm px-2 py-1 bg-red-500 rounded-md text-white font-bold" type="submit">Delete
                Post</button>
        </form>

    </div>
</main>

<?php require base_path("views/includes/foot.php") ?>
