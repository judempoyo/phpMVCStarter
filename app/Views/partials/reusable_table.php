<?php
extract($tableParams);

$title = $title ?? 'Liste des éléments';
$createUrl = $createUrl ?? '#';
$columns = $columns ?? [];
$data = $data ?? NULL;
$actions = $actions ?? [];
$filters = $filters ?? [];
$modelName = $modelName ?? 'default';
$showExport = $showExport ?? true;
?>

<div class="max-w-full p-6 mx-auto mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 animate__animated animate__fadeIn">
    <!-- Header avec titre, boutons et outils -->
    <div class="flex flex-col justify-between gap-6 mb-6 md:flex-row md:items-center">
        <div class="flex items-center gap-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white md:text-3xl animate__animated animate__fadeInLeft">
                <?= $title ?>
            </h1>
            <?php if ($data && $data->total() > 0): ?>
                <span class="px-3 py-1 text-sm font-medium text-teal-800 bg-teal-100 rounded-full dark:bg-teal-900 dark:text-teal-200">
                    <?= $data->total() ?> élément<?= $data->total() > 1 ? 's' : '' ?>
                </span>
            <?php endif; ?>
        </div>
        
        <div class="flex flex-wrap items-center gap-3 animate__animated animate__fadeInRight">
            <?php if (!empty($filters)): ?>
                <button type="button" onclick="toggleFilters()"
                    class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-teal-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                    </svg>
                    Filtres
                </button>
            <?php endif; ?>
            
            <?php if ($showExport): ?>
                <a href="<?= PUBLIC_URL . $modelName ?>/export"
                    class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 group-hover:text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Exporter
                </a>
            <?php endif; ?>
            
            <a href="<?= $createUrl ?>"
                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white transition-all duration-300 bg-teal-500 rounded-lg hover:bg-teal-600 dark:bg-teal-600 dark:hover:bg-teal-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Ajouter
            </a>
        </div>
    </div>

    <!-- Filtres -->
    <?php if (!empty($filters)): ?>
    <div class="mb-6 animate__animated animate__fadeInUp">
        <form method="GET" action="" id="filterForm">
            <div id="filtersContainer" class="<?= empty($_GET['search']) ? 'hidden' : '' ?> p-4 mt-2 bg-gray-50 rounded-lg dark:bg-gray-700">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <?php foreach ($filters as $filter): ?>
                        <div>
                            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                                <?= $filter['label'] ?? 'Filtrer' ?>
                            </label>
                            <input type="<?= $filter['type'] ?? 'text' ?>" 
                                   name="<?= $filter['name'] ?? 'search' ?>" 
                                   placeholder="<?= $filter['placeholder'] ?? 'Rechercher...' ?>"
                                   value="<?= htmlspecialchars($_GET[$filter['name'] ?? 'search'] ?? '') ?>"
                                   class="w-full px-3 py-2 text-sm transition duration-300 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="flex flex-wrap items-center justify-end gap-3 mt-4">
                    <?php if (!empty($_GET)): ?>
                        <a href="<?= PUBLIC_URL . $modelName ?>"
                            class="px-4 py-2 text-sm font-medium text-gray-700 transition duration-300 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300 dark:hover:bg-gray-500">
                            Réinitialiser
                        </a>
                    <?php endif; ?>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white transition duration-300 bg-teal-500 rounded-lg hover:bg-teal-600 dark:bg-teal-600 dark:hover:bg-teal-700">
                        Appliquer les filtres
                    </button>
                </div>
            </div>
            
            <!-- Champs cachés pour les paramètres de tri -->
            <input type="hidden" name="sort" value="<?= htmlspecialchars($_GET['sort'] ?? '') ?>">
            <input type="hidden" name="direction" value="<?= htmlspecialchars($_GET['direction'] ?? '') ?>">
        </form>
    </div>
    <?php endif; ?>

    <!-- Tableau -->
    <div class="overflow-x-auto rounded-lg shadow animate__animated animate__fadeInUp">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <?php foreach ($columns as $column): ?>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                            <div class="flex items-center group">
                                <span><?= $column['label'] ?></span>
                                <a href="?sort=<?= $column['key'] ?>&direction=<?= $sort === $column['key'] && $direction === 'asc' ? 'desc' : 'asc' ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?>"
                                   class="ml-1 transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                                    <?php if ($sort === $column['key']): ?>
                                        <span class="text-teal-500">
                                            <?= $direction === 'asc' ? '↑' : '↓' ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="text-gray-400 hover:text-teal-500">↕</span>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </th>
                    <?php endforeach; ?>
                    
                    <?php if (!empty($actions)): ?>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase dark:text-gray-300">
                            Actions
                        </th>
                    <?php endif; ?>
                </tr>
            </thead>
            
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <?php if ($data && $data->count() > 0): ?>
                    <?php foreach ($data as $item): ?>
                        <tr class="transition duration-150 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <?php foreach ($columns as $column): ?>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center text-sm text-gray-900 dark:text-gray-100">
                                        <?php if ($column['key'] === 'status'): ?>
                                            <?php
                                            $status = $item[$column['key']];
                                            $badgeClasses = match ($status) {
                                                'active' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                                'inactive' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                                'banned' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                                                'pending' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                                default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
                                            };
                                            ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $badgeClasses ?>">
                                                <?php if (isset($column['icon'][$status])): ?>
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="<?= $column['icon'][$status] ?>" clip-rule="evenodd" />
                                                    </svg>
                                                <?php endif; ?>
                                                <?= ucfirst($status) ?>
                                            </span>
                                        <?php elseif (isset($column['format']) && $column['format'] === 'date'): ?>
                                            <?= date('d/m/Y H:i', strtotime($item[$column['key']])) ?>
                                        <?php elseif (isset($column['format']) && $column['format'] === 'boolean'): ?>
                                            <span class="inline-flex items-center">
                                                <?php if ($item[$column['key']]): ?>
                                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                <?php else: ?>
                                                    <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                <?php endif; ?>
                                            </span>
                                        <?php elseif (isset($column['render']) && is_callable($column['render'])): ?>
                                            <?= $column['render']($item) ?>
                                        <?php else: ?>
                                            <?= htmlspecialchars($item[$column['key']] ?? '') ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            <?php endforeach; ?>
                            
                            <?php if (!empty($actions)): ?>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex justify-end space-x-2">
                                        <?php foreach ($actions as $action): ?>
                                            <?php if (isset($action['type']) && $action['type'] === 'delete'): ?>
                                                <button onclick="openModal('deleteModal-<?= $item['id'] ?>')"
                                                    class="p-1.5 text-red-500 transition duration-200 rounded-full hover:bg-red-50 dark:hover:bg-red-900/30"
                                                    title="<?= $action['label'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            <?php else: ?>
                                                <a href="<?= $action['url']($item) ?>"
                                                   class="p-1.5 text-gray-500 transition duration-200 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700"
                                                   title="<?= $action['label'] ?>">
                                                    <?php if (isset($action['icon'])): ?>
                                                        <?= $action['icon'] ?>
                                                    <?php else: ?>
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>

                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>

                        <?php if (isset($actions[1]['type']) && $actions[1]['type'] === 'delete'): ?>
                            <?php
                            $modalParams = [
                                'modalId' => 'deleteModal-' . $item['id'],
                                'modalTitle' => 'Confirmer la suppression',
                                'message' => 'Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.',
                                'formAction' => $actions[1]['url']($item),
                                'submitText' => 'Supprimer',
                                'submitColor' => 'red',
                                'cancelText' => 'Annuler',
                                'includePasswordField' => false,
                            ];
                            include __DIR__ . '/modal.php';
                            ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?= count($columns) + (!empty($actions) ? 1 : 0) ?>" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 mb-4 opacity-50 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-lg font-medium">Aucun résultat trouvé</p>
                                <p class="text-sm">Essayez de modifier vos critères de recherche</p>
                                <?php if (!empty($_GET)): ?>
                                    <a href="<?= PUBLIC_URL . $modelName ?>" class="mt-4 text-sm text-teal-500 hover:text-teal-600 dark:hover:text-teal-400">
                                        Réinitialiser les filtres
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($data && $data->hasPages()): ?>
    <div class="flex flex-col items-center justify-between mt-6 space-y-4 sm:flex-row sm:space-y-0 animate__animated animate__fadeInUp">
        <div class="text-sm text-gray-700 dark:text-gray-300">
            Affichage de <span class="font-medium"><?= $data->firstItem() ?></span> à <span class="font-medium"><?= $data->lastItem() ?></span> sur <span class="font-medium"><?= $data->total() ?></span> résultats
        </div>
        
        <div class="flex items-center space-x-1">
            <!-- Premier -->
            <a href="<?= $data->url(1) ?>" 
               class="px-3 py-1 text-sm border rounded-lg <?= $data->onFirstPage() ? 'text-gray-400 bg-gray-100 border-gray-200 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500' : 'text-gray-700 bg-white border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' ?>">
                &laquo;
            </a>
            
            <!-- Précédent -->
            <a href="<?= $data->previousPageUrl() ?>" 
               class="px-3 py-1 text-sm border rounded-lg <?= $data->onFirstPage() ? 'text-gray-400 bg-gray-100 border-gray-200 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500' : 'text-gray-700 bg-white border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' ?>">
                &lsaquo;
            </a>
            
            <!-- Pages -->
            <?php foreach ($data->getUrlRange(max(1, $data->currentPage() - 2), min($data->lastPage(), $data->currentPage() + 2)) as $page => $url): ?>
                <a href="<?= $url ?>" 
                   class="px-3 py-1 text-sm border rounded-lg <?= $page == $data->currentPage() ? 'text-white bg-teal-500 border-teal-500 dark:bg-teal-600 dark:border-teal-600' : 'text-gray-700 bg-white border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' ?>">
                    <?= $page ?>
                </a>
            <?php endforeach; ?>
            
            <!-- Suivant -->
            <a href="<?= $data->nextPageUrl() ?>" 
               class="px-3 py-1 text-sm border rounded-lg <?= !$data->hasMorePages() ? 'text-gray-400 bg-gray-100 border-gray-200 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500' : 'text-gray-700 bg-white border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' ?>">
                &rsaquo;
            </a>
            
            <!-- Dernier -->
            <a href="<?= $data->url($data->lastPage()) ?>" 
               class="px-3 py-1 text-sm border rounded-lg <?= !$data->hasMorePages() ? 'text-gray-400 bg-gray-100 border-gray-200 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500' : 'text-gray-700 bg-white border-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' ?>">
                &raquo;
            </a>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    // Fermer les dropdowns quand on clique ailleurs
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
    
    const filterForm = document.getElementById('filterForm');
    if (filterForm) {
        filterForm.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && e.target.tagName === 'INPUT') {
                e.preventDefault();
                this.submit();
            }
        });
    }
});

function toggleFilters() {
    const container = document.getElementById('filtersContainer');
    if (container) {
        container.classList.toggle('hidden');
        localStorage.setItem('filtersVisible', container.classList.contains('hidden') ? 'false' : 'true');
    }
}

window.addEventListener('load', function() {
    const filtersVisible = localStorage.getItem('filtersVisible');
    const container = document.getElementById('filtersContainer');
    
    if (container && filtersVisible === 'true') {
        container.classList.remove('hidden');
    }
});
</script>