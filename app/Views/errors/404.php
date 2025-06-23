<?php ob_start() ?>
<div class="flex items-center justify-center min-h-screen bg-gray-200 dark:bg-gray-900">
    <div class="max-w-2xl p-8 text-center transition-colors duration-300 bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="mb-6">
            <span class="font-bold text-teal-500 text-9xl dark:text-teal-400">404</span>
            <h1 class="mt-4 text-4xl font-bold text-gray-800 dark:text-gray-200">Page introuvable</h1>
        </div>
        
        <div class="mb-8">
            <p class="mb-4 text-xl text-gray-600 dark:text-gray-400">
                Oups ! La page que vous cherchez semble s'être envolée...
            </p>
            <div class="animate-bounce">
                <svg class="w-16 h-16 mx-auto text-teal-500 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <div class="space-y-4">
            <a href="<?= PUBLIC_URL ?>" 
               class="inline-block px-6 py-3 font-bold text-white transition duration-300 bg-teal-500 rounded-lg dark:bg-teal-600 hover:bg-teal-600 dark:hover:bg-teal-700">
                ← Retour à l'accueil
            </a>
            <p class="mt-4 text-gray-500 dark:text-gray-400">
                Ou contactez-nous à <a href="mailto:Bojo45@gmail.com" class="text-teal-500 dark:text-teal-400 hover:underline">support@kongb.local</a>
            </p>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
$title = "Page non trouvée - Error 404";
include __DIR__ . '/../layouts/app.guest.php'; 
?>