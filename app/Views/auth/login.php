<div class="max-w-md mx-auto my-10 bg-white rounded-xl shadow-md overflow-hidden dark:bg-gray-800 dark:shadow-gray-900/50">
    <!-- En-tête avec dégradé -->
    <div class="bg-gradient-to-r from-teal-500 to-gray-600 p-6 text-white dark:from-teal-600 dark:to-gray-700">
        <h1 class="text-2xl font-bold text-center dark:text-gray-100">Connexion</h1>
    </div>

    <!-- Contenu -->
    <div class="p-6">
        <?php if ($error): ?>
            <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded mb-4 dark:bg-red-900/30 dark:border-red-400">
                <p class="text-red-700 dark:text-red-200"><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>

        <form action="<?= PUBLIC_URL ?>login" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Adresse email</label>
                <input type="email" name="email" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50">
            </div>
            
            <button type="submit" 
                    class="w-full bg-teal-600 text-white py-3 px-4 rounded-lg hover:bg-teal-700 transition duration-200 flex items-center justify-center focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:bg-teal-700 dark:hover:bg-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
                Se connecter
            </button>
        </form>
        
        <div class="mt-6 text-center space-y-3">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Mot de passe oublié ? 
                <a href="<?= PUBLIC_URL ?>forgot-password" class="text-teal-600 hover:underline dark:text-teal-400">Réinitialiser</a>
            </p>
           <!--  <p class="text-sm text-gray-600 dark:text-gray-400">
                Pas de compte ? 
                <a href="<?= PUBLIC_URL ?>register" class="text-teal-600 hover:underline dark:text-teal-400">S'inscrire</a>
            </p> -->
        </div>
    </div>
</div>