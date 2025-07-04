<div class="max-w-md mx-auto my-10 bg-white rounded-xl shadow-md overflow-hidden dark:bg-zinc-800 dark:shadow-zinc-900/50">
    <div class="bg-gradient-to-r from-teal-500 to-zinc-600 p-6 text-white dark:from-teal-600 dark:to-zinc-700">
        <h1 class="text-2xl font-bold text-center dark:text-zinc-100">Créer un compte</h1>
    </div>


    <div class="p-6">
        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded mb-4 dark:bg-red-900/30 dark:border-red-400">
                <?php foreach ($errors as $error): ?>
                    <p class="text-red-700 dark:text-red-200"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?=  url('/register')  ?>" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1 dark:text-zinc-300">Nom complet</label>
                <input type="text" name="name" required
                       value="<?= htmlspecialchars($old['name'] ?? '') ?>"
                       class="w-full px-4 py-3 rounded-lg border border-zinc-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-100 dark:focus:ring-teal-500/50">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1 dark:text-zinc-300">Adresse email</label>
                <input type="email" name="email" required
                       value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                       class="w-full px-4 py-3 rounded-lg border border-zinc-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-100 dark:focus:ring-teal-500/50">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1 dark:text-zinc-300">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 rounded-lg border border-zinc-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-100 dark:focus:ring-teal-500/50">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-zinc-700 mb-1 dark:text-zinc-300">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-3 rounded-lg border border-zinc-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-100 dark:focus:ring-teal-500/50">
            </div>
            
            <button type="submit" 
                    class="w-full bg-teal-600 text-white py-3 px-4 rounded-lg hover:bg-teal-700 transition duration-200 flex items-center justify-center focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:bg-teal-700 dark:hover:bg-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                S'inscrire
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-zinc-600 dark:text-zinc-400">
                Déjà inscrit ? 
                <a href="<?=  url('/login')  ?>" class="text-teal-600 hover:underline dark:text-teal-400">Se connecter</a>
            </p>
        </div>
    </div>
</div>