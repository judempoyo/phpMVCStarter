<!-- Contenu principal -->
<div class="flex flex-col flex-1 overflow-hidden">
    <!-- Main content -->
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tableau de bord</h1>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                <?= date('l, j F Y') ?>
            </div>
        </div>


        <!-- Statistiques rapides -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total clients -->
            <div class="bg-white p-6 rounded-xl shadow dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total clients</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                            <?= $totalCustomers ?>
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total séances -->
            <div class="bg-white p-6 rounded-xl shadow dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total séances</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                            <?= $totalSessions ?>
                        </p>
                    </div>
                    <div
                        class="p-3 rounded-full bg-teal-100 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400">
                        <i class="fas fa-camera-retro text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Séances aujourd'hui -->
            <div class="bg-white p-6 rounded-xl shadow dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Séances aujourd'hui</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                            <?= $todaySessions ?>
                        </p>
                    </div>
                    <div
                        class="p-3 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                        <i class="fas fa-calendar-day text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Revenu mensuel avec tooltip -->
<div class="bg-white p-6 rounded-xl shadow dark:bg-gray-800 relative group">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Revenu mensuel</p>
            <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                <?= number_format($monthlyRevenue, 0, ',', ' ') ?>FC
            </p>
        </div>
        <div class="p-3 rounded-full bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
            <i class="fas fa-euro-sign text-xl"></i>
        </div>
    </div>
    
    <!-- Tooltip avec tarifs -->
    <div class="absolute z-10 invisible group-hover:visible w-64 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-700 top-full left-0 mt-2">
        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Grille tarifaire</h4>
        <div class="space-y-2">
            <?php foreach($sessionPrices as $type => $price): ?>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-300"><?= $type ?></span>
                    <span class="font-medium text-teal-600 dark:text-teal-400"><?= $price ?>FC</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
        </div>
        <!-- Graphiques et données -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Répartition par type de séance -->
            <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Types de séances</h3>
                <div class="h-64">
                    <canvas id="sessionTypeChart"></canvas>
                </div>
            </div>

            <!-- Statut des séances -->
            <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Statut des séances</h3>
                <div class="h-64">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>

            <!-- Activité récente -->
            <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Activité récente</h3>
                <div class="space-y-4">
                    <?php foreach ($upcomingSessions->take(3) as $session): ?>
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 h-10 w-10 rounded-full bg-teal-100 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400 flex items-center justify-center">
                                <?= substr($session->customer->name, 0, 1) ?>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    <?= $session->customer->name ?>
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    <?= $session->type ?> - <?= date('H:i', strtotime($session->date)) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Prochaines séances et dernières photos -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Prochaines séances -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow dark:bg-gray-800">
                    <div
                        class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Prochaines séances</h3>
                        <a href="<?= $this->basePath ?>/photo-session"
                            class="text-sm text-teal-600 hover:text-teal-900 dark:text-teal-400">
                            Voir toutes
                        </a>
                    </div>
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        <?php foreach ($upcomingSessions as $session): ?>
                            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="h-10 w-10 rounded-full bg-teal-100 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400 flex items-center justify-center">
                                                <?= substr($session->customer->name, 0, 1) ?>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                <?= $session->customer->name ?>
                                            </p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                <?= $session->type ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            <?= date('H:i', strtotime($session->date)) ?>
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            <?= date('d/m/Y', strtotime($session->date)) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Dernières photos -->
            <div>
                <div class="bg-white rounded-xl shadow dark:bg-gray-800">
                    <div
                        class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Dernières photos</h3>
                        <a href="<?= $this->basePath ?>/photo-session"
                            class="text-sm text-teal-600 hover:text-teal-900 dark:text-teal-400">
                            Voir toutes
                        </a>
                    </div>
                    <div class="p-4 grid grid-cols-2 gap-4">
                        <?php foreach ($recentPhotos as $photo): ?>
                            <div class="relative group">
                                <img class="w-full h-32 object-cover rounded-lg"
                                    src="<?= $this->basePath ?>/<?= $photo->path ?>"
                                    alt="<?= $photo->session->type ?? 'Photo' ?>">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-lg transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <span class="text-white text-sm font-medium">
                                        <?= $photo->session->customer->name ?? '' ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php use App\Models\PhotoSession; ?>
<!-- Scripts pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique des types de séance
    const typeCtx = document.getElementById('sessionTypeChart').getContext('2d');
    const typeChart = new Chart(typeCtx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_keys($sessionTypes)) ?>,
            datasets: [{
                data: <?= json_encode(array_values($sessionTypes)) ?>,
                backgroundColor: [
                    '#10B981', '#EC4899', '#6366F1',
                    '#F59E0B', '#3B82F6', '#8B5CF6'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Graphique des statuts
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['Planifiée', 'Terminée', 'Traitée'],
            datasets: [{
                label: 'Séances',
                data: [
                    <?= $statusStats[PhotoSession::STATUS_PLANNED] ?? 0 ?>,
                    <?= $statusStats[PhotoSession::STATUS_COMPLETED] ?? 0 ?>,
                    <?= $statusStats[PhotoSession::STATUS_PROCESSED] ?? 0 ?>
                ],
                backgroundColor: [
                    '#3B82F6',
                    '#F59E0B',
                    '#10B981'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>