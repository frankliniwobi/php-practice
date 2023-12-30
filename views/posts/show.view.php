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

        <a href="/posts" class="mb-5 text-blue-500 hover:underline active:underline block">See all my
            posts</a>

        <div class="relative py-6 bg-white px-6  ">

            <div class="mx-auto grid ">
                <div
                    class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                    <div class="lg:pr-4">
                        <div class="lg:max-w-lg">
                            <p class="text-base font-semibold leading-7 text-indigo-600">By: <?= auth('name') ?></p>
                            <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                <?= htmlspecialchars($post['title']) ?>
                            </h1>
                            <p class="mt-6 text-xl leading-8 text-gray-700">
                                <?= htmlspecialchars($post['body']) ?>
                            </p>
                        </div>


                        <div class="mt-12 flex gap-3 align-items-start justify-start">
                            <a href="/post/edit?id=<?= $post['id'] ?>"
                                class="text-xs px-3 py-1 bg-green-500 font-bold rounded-md text-white" type="submit">
                                Edit
                            </a>

                            <form class="p-0 m-0" method="POST">
                                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="text-xs px-2 py-1 bg-red-500 rounded-md font-bold text-white"
                                    type="submit">Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>



    </div>
</main>

<?php require base_path("views/includes/foot.php") ?>