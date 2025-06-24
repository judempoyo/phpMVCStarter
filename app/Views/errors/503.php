<?php ob_start() ?>
<div class="flex items-center justify-center min-h-screen bg-zinc-200 dark:bg-zinc-900">
    <div class="max-w-2xl p-8 text-center transition-colors duration-300 bg-white rounded-lg shadow-xl dark:bg-zinc-800">
        <div class="mb-6">
            <span class="font-bold text-yellow-500 text-9xl dark:text-yellow-400">503</span>
            <h1 class="mt-4 text-4xl font-bold text-zinc-800 dark:text-zinc-200">Service indisponible</h1>
        </div>
        
        <div class="mb-8">
            <p class="mb-4 text-xl text-zinc-600 dark:text-zinc-400">
                Oups ! Notre service est actuellement indisponible. Veuillez réessayer plus tard.
            </p>
            <div class="animate-bounce">
            <svg class="w-16 h-16 mx-auto text-yellow-500 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 20.5a8.5 8.5 0 110-17 8.5 8.5 0 010 17z"/>
                </svg>
            </div>
        </div>

        <div class="space-y-4">
            <a href="<?= url('/') ?>" 
               class="inline-block px-6 py-3 font-bold text-white transition duration-300 bg-yellow-500 rounded-lg dark:bg-yellow-600 hover:bg-yellow-600 dark:hover:bg-yellow-700">
                ← Retour à l'accueil
            </a>
            <p class="mt-4 text-zinc-500 dark:text-zinc-400">
                Revenez plus tard ou contactez-nous à  
                <a href="mailto:<?= $appSupportMail ?>" class="text-yellow-500 dark:text-yellow-400 hover:underline"><?= $appSupportMail ?></a>
            </p>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
$title = "Service indisponible - Error 503";
include __DIR__ . '/../layouts/app.guest.php'; 
?>