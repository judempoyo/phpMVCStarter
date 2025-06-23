<!DOCTYPE html>
<html lang="fr" class="transition duration-500">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= PUBLIC_URL ?>css/output.css" rel="stylesheet">
    <link href="<?= PUBLIC_URL ?>css/custom.css" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
/>
    <title> <?= htmlspecialchars($title) ?? 'KONGB' ?></title>
</head>

<body class="bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-white ">
<div class="flex h-full">
 
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>
    <div class="flex flex-col flex-1 overflow-hidden h-screen">

        <?php include __DIR__ . '/../partials/header.php'; ?>

        <main class="flex-1 p-8 overflow-y-auto">

            <?= $content ?>

            <!-- Bouton Retour (conditionnel) -->
            <?php
            $currentRoute = $_SERVER['REQUEST_URI'];

            $hideBackButton = in_array($currentRoute, [
                '/Projets/KongB/public/dashboard',
                '/Projets/KongB/public/customer',
                '/Projets/KongB/public/booking',
            ]);

            if (!$hideBackButton): ?>
                <button onclick="goBack() "
                    class="mb-4 mt-4 p-2 bg-teal-500 text-white rounded-lg cursor-pointer hover:bg-teal-600">
                    Retour
                </button>
            <?php endif ?>


        </main>
    </div>
</div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>


    <script src="<?= PUBLIC_URL ?>js/main.js"></script>

    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
</body>

</html>