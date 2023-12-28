<?php require "includes/head.php" ?>

<?php require "includes/nav.php" ?>

<?php require "includes/barner.php" ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <?php if(isset($_GET['success'])) : ?>
                <div class="my-5 p-5 bg-green-300 rounded-md ">
                    <span class="font-bold text-black"><?= $_GET['success'] ?></span>
                </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">

                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-700">Title</label>

                                <div class="mt-1">
                                    <input id="title" name="title" value="<?php echo $_POST['title'] ?? '' ?>"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></input>
                                </div>


                                <small class="text-red-500 mt-2"><?= $errors['title'] ?? '' ?></small>


                            </div>

                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>

                                <div class="mt-1">
                                    <textarea id="body" name="body" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Here's an idea for a post..."><?php echo $_POST['body'] ?? '' ?></textarea>
                                </div>


                                <small class="text-red-500 mt-2"><?= $errors['body'] ?? '' ?></small>

                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require "includes/foot.php" ?>
