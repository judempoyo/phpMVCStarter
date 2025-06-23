<div class="max-w-2xl mx-auto my-10 bg-white rounded-xl shadow-md overflow-hidden dark:bg-gray-800 dark:shadow-gray-900/50">
    <!-- En-tête avec photo de profil -->
    <div class="bg-gradient-to-r from-teal-500 to-gray-600 p-6 text-white dark:from-teal-600 dark:to-gray-700">
        <div class="flex items-center space-x-4">
            <div class="relative">
               <!--  <img class="h-16 w-16 rounded-full border-4 border-white/30 object-cover dark:border-gray-800/30" 
                     src="https://ui-avatars.com/api/?name=<?= urlencode($user->name) ?>&background=random" 
                     alt="Photo de profil"> -->
                     <div class="h-16 w-16 rounded-full border-4 border-white/30 bg-gray-50 dark:border-gray-800/30 place-content-center justify-center items-center">
                        <h2 class="text-center text-3xl font-bold text-teal-700 "><?= $user->initials()?></h2>
                     </div>
                <span class="absolute bottom-0 right-0 bg-green-500 rounded-full h-4 w-4 border-2 border-white dark:border-gray-800"></span>
            </div>
            <div>
                <h1 class="text-2xl font-bold dark:text-gray-100"><?= htmlspecialchars($user->name) ?></h1>
                <p class="text-teal-100 dark:text-teal-200"><?= htmlspecialchars($user->email) ?></p>
            </div>
        </div>
    </div>
    
    <!-- Contenu principal -->
    <div class="p-6 space-y-6 dark:p-6">
        <!-- Messages d'erreur/succès -->
        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded mb-4 dark:bg-red-900/30 dark:border-red-400">
                <?php foreach ($errors as $error): ?>
                    <p class="text-red-700 dark:text-red-200"><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->has('success')): ?>
            <div class="bg-teal-100 border-l-4 border-teal-500 p-4 rounded mb-4 dark:bg-teal-900/30 dark:border-teal-400">
                <p class="text-teal-700 dark:text-teal-200"><?= htmlspecialchars($this->session->get('success')) ?></p>
            </div>
            <?php $this->session->remove('success'); ?>
        <?php endif; ?>

        <!-- Section Informations personnelles -->
        <div class="bg-gray-50 dark:bg-gray-700/30 p-5 rounded-lg border border-gray-100 dark:border-gray-600/50">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                Informations personnelles
            </h2>
            
            <form action="<?= PUBLIC_URL ?>profile/update-info" method="POST">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Nom complet</label>
                        <input type="text" name="name" required
                               value="<?= htmlspecialchars($user->name) ?>"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50 dark:focus:border-teal-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Adresse email</label>
                        <input type="email" name="email" required
                               value="<?= htmlspecialchars($user->email) ?>"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50 dark:focus:border-teal-500">
                    </div>
                    
                    <button type="submit" 
                            class="w-full mt-2 bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-200 flex items-center justify-center focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:bg-teal-700 dark:hover:bg-teal-800 dark:focus:ring-teal-500 dark:focus:ring-offset-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>

        <!-- Section Mot de passe -->
        <div class="bg-gray-50 dark:bg-gray-700/30 p-5 rounded-lg border border-gray-100 dark:border-gray-600/50">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
                Sécurité du compte
            </h2>
            
            <form action="<?= PUBLIC_URL ?>profile/update-password" method="POST">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Mot de passe actuel</label>
                        <input type="password" name="current_password" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50 dark:focus:border-teal-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Nouveau mot de passe</label>
                        <input type="password" name="new_password" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50 dark:focus:border-teal-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Confirmation</label>
                        <input type="password" name="new_password_confirmation" required
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-200 focus:border-teal-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:focus:ring-teal-500/50 dark:focus:border-teal-500">
                    </div>
                    
                    <button type="submit" 
                            class="w-full mt-2 bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 transition duration-200 flex items-center justify-center focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:bg-teal-700 dark:hover:bg-teal-800 dark:focus:ring-teal-500 dark:focus:ring-offset-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        Changer le mot de passe
                    </button>
                </div>
            </form>
        </div>

        <!-- Section Danger -->
        <div class="bg-red-50 dark:bg-red-900/10 p-5 rounded-lg border border-red-100 dark:border-red-900/50">
            <h2 class="text-xl font-semibold mb-4 text-red-800 dark:text-red-200 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 dark:text-red-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                Zone dangereuse
            </h2>
            
            <p class="text-red-700 dark:text-red-300 mb-4 text-sm">
                La suppression de votre compte est irréversible. Toutes vos données seront définitivement perdues.
            </p>
            
            <button onclick="openModal('deleteAccountModal')"
                    class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-200 flex items-center justify-center focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-500 dark:focus:ring-offset-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                Supprimer mon compte
            </button>
        </div>
    </div>
</div>

<!-- Inclure le modal pour la suppression du compte -->
<?php
$modalParams = [
    'modalId' => 'deleteAccountModal',
    'modalTtitle' => 'Confirmer la suppression',
    'message' => 'Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.',
    'formAction' => PUBLIC_URL . 'profile/delete',
    'submitText' => 'Supprimer',
    'cancelText' => 'Annuler',
    'includePasswordField' => true,
];
include __DIR__ . '/../partials/modal.php';
?>