<div class="max-w-md mx-auto my-10 bg-white rounded-xl shadow-md overflow-hidden dark:bg-zinc-800 dark:shadow-zinc-900/50">
    <div class="bg-gradient-to-r from-teal-500 to-zinc-600 p-6 text-white dark:from-teal-600 dark:to-zinc-700">
        <h1 class="text-2xl font-bold text-center dark:text-zinc-100">Mot de passe oublié</h1>
    </div>

    <div class="p-6">
        <?php if ($error): ?>
            <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded mb-4 dark:bg-red-900/30 dark:border-red-400">
                <p class="text-red-700 dark:text-red-200"><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>

        <form action="<?= url('/forgot-password')  ?>" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1 dark:text-zinc-300">Adresse email</label>
                <input type="email" name="email" required
                       class="w-full px-4 py-3 rounded-lg border border-zinc-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-100 dark:focus:ring-teal-500/50">
            </div>
            
            <button type="submit" 
                    class="w-full bg-teal-600 text-white py-3 px-4 rounded-lg hover:bg-teal-700 transition duration-200 flex items-center justify-center focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:bg-teal-700 dark:hover:bg-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
                Envoyer le lien
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <a href="<?= url('/login')  ?>" class="text-sm text-teal-600 hover:underline dark:text-teal-400">Retour à la connexion</a>
        </div>
    </div>
</div>