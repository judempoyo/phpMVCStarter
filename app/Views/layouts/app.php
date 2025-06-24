<!DOCTYPE html>
<html lang="fr" class="transition duration-500">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
/>
    <title> <?= env('APP_TITLE', 'PHPMVCStarter') ?></title>
</head>

<body class="bg-zinc-200 dark:bg-zinc-900 text-zinc-900 dark:text-white ">
<div class="flex h-full">
 
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>
    <div class="flex flex-col flex-1 overflow-hidden h-screen">

        <?php include __DIR__ . '/../partials/header.php'; ?>

        <main class="flex-1 p-8 overflow-y-auto">

            <?= $content ?>

           
        </main>
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </div>
</div>



    <script src="/js/main.js"></script>

    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
</body>

</html>