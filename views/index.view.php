<?php require base_path("views/includes/head.php") ?>

<?php require base_path("views/includes/nav.php") ?>

<?php require base_path("views/includes/barner.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Hello <span class="text-blue-500 font-bold"> <?= $_SESSION['user']['name'] ?? '' ?> </span>,welcome to the
            Home page.</p>
    </div>
</main>

<?php require base_path( "views/includes/foot.php") ?>
