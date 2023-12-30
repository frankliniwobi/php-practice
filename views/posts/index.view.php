<?php require base_path("views/includes/head.php") ?>

<?php require base_path("views/includes/nav.php") ?>

<?php require base_path("views/includes/barner.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php if(\Core\Session::has('success')) : ?>
        <div class="my-5 p-5 bg-green-300 rounded-md ">
            <span class="font-bold text-black"><?= \Core\Session::get('success') ?></span>
        </div>
        <?php endif; ?>
        <?php if(empty($posts)) : ?>
        <p>You don't have any posts yet.</p>
        <?php endif; ?>
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

<?php require base_path("views/includes/foot.php") ?>