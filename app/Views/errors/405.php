<?php ob_start() ?>
<div class="flex items-center justify-center min-h-screen bg-gray-200 dark:bg-gray-900">
    <div class="max-w-2xl p-8 text-center transition-colors duration-300 bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="mb-6">
            <span class="font-bold text-red-500 text-9xl dark:text-red-400">405</span>
            <h1 class="mt-4 text-4xl font-bold text-gray-800 dark:text-gray-200">Méthode non autorisée</h1>
        </div>
        
        <div class="mb-8">
            <p class="mb-4 text-xl text-gray-600 dark:text-gray-400">
                Oups ! Cette action n'est pas permise sur cette page.
            </p>
            <div class="animate-bounce">
               
                <svg class="w-16 h-16 mx-auto text-red-500 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
  <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
</svg>
            </div>
        </div>

        <div class="space-y-4">
            <a href="<?= PUBLIC_URL ?>" 
               class="inline-block px-6 py-3 font-bold text-white transition duration-300 bg-red-500 rounded-lg dark:bg-red-600 hover:bg-red-600 dark:hover:bg-red-700">
                ← Retour à l'accueil
            </a>
            <p class="mt-4 text-gray-500 dark:text-gray-400">
                Besoin d'aide ? Contactez-nous à  
                <a href="mailto:support@kongb.local" class="text-red-500 dark:text-red-400 hover:underline">support@kongb.local</a>
            </p>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
$title = "Méthode non autorisée - Error 405";
include __DIR__ . '/../layouts/app.guest.php'; 
?>
