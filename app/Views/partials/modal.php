<?php
// Extraire les variables du tableau $modalParams
extract($modalParams);

// Paramètres par défaut (utilisés si les variables ne sont pas définies)
$modalId = $modalId ?? 'customModal';
$modalTtitle = $modalTtitle ?? 'Confirmer l\'action';
$message = $message ?? 'Êtes-vous sûr de vouloir effectuer cette action ?';
$formAction = $formAction ?? '#';
$submitText = $submitText ?? 'Confirmer';
$cancelText = $cancelText ?? 'Annuler';
$includePasswordField = $includePasswordField ?? false;
?>

<!-- Modal de confirmation -->
<div id="<?= $modalId ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-800">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100"><?= $modalTtitle ?></h2>
        <p class="mb-6 text-gray-700 dark:text-gray-300"><?= $message ?></p>
        
        <form id="<?= $modalId ?>Form" action="<?= $formAction ?>" method="POST">
            <?php if ($includePasswordField): ?>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2 dark:text-gray-300">Mot de passe</label>
                    <input type="password" name="password" required
                           class="w-full px-3 py-2 border rounded dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                </div>
            <?php endif; ?>
            
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeModal('<?= $modalId ?>')"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-800">
                    <?= $cancelText ?>
                </button>
                <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 dark:bg-red-700 dark:hover:bg-red-800">
                    <?= $submitText ?>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script pour gérer le modal -->
<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        } else {
            console.error(`Modal with ID ${modalId} not found.`);
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
        } else {
            console.error(`Modal with ID ${modalId} not found.`);
        }
    }
</script>