
<div class="flex flex-col flex-1 overflow-hidden">
    <main class="flex-1 overflow-y-auto p-6 bg-zinc-50 dark:bg-zinc-900">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Tableau de bord</h1>
            <div class="text-sm text-zinc-500 dark:text-zinc-400">
                <?= date('l, j F Y') ?>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Carte exemple -->
            <div class="bg-white p-6 rounded-xl shadow dark:bg-zinc-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Exemple de donnée</p>
                        <p class="mt-1 text-3xl font-semibold text-zinc-900 dark:text-white">
                            0
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="fas fa-cube text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow dark:bg-zinc-800">
            <div class="text-center py-12">
                <i class="fas fa-box-open text-4xl text-zinc-300 dark:text-zinc-600 mb-4"></i>
                <h3 class="text-lg font-medium text-zinc-500 dark:text-zinc-400">Votre contenu ici</h3>
                <p class="mt-1 text-sm text-zinc-400 dark:text-zinc-500">
                    Cet espace est prêt à accueillir vos données et composants
                </p>
            </div>
        </div>
    </main>
</div>