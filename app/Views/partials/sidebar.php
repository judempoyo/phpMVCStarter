
<div id="wrapper" class="mb-0">
    <button id="mobileSidebarTrigger" class="fixed z-40 p-2 m-2 text-gray-600 bg-white rounded-lg shadow-md md:hidden dark:bg-gray-700 dark:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

 
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 h-screen p-4 transition-all duration-300 transform -translate-x-full bg-white shadow-2xl md:relative md:translate-x-0 dark:bg-gray-800">
        <button id="closeSidebar" class="absolute p-2 text-gray-500 rounded-lg md:hidden -right-3 top-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>


        <button onclick="toggleSidebar()"
            class="absolute p-2 transition-colors duration-200 bg-gray-200 rounded-full shadow-xl -right-3 top-4 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 hidden md:block"
            id="toggleSidebarBtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

     
          <div class="flex items-center justify-center w-full mx-auto text-center p-auto place-content-center">
            <div class="p-2 rounded-lg bg-teal-50 dark:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-teal-500 dark:text-teal-400" 
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white sidebar-text">
                <span class="text-teal-500">Kong</span>B
            </h1>
        </div>

        <hr class="my-2 border-t border-gray-300 dark:border-gray-600">

        <!-- Menu principal -->
        <ul class="space-y-2">
            <!-- Tableau de bord -->
            <li class="mt-6">
                <a href="<?= PUBLIC_URL ?>"
                    class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= ($_SERVER['REQUEST_URI'] === '/Projets/KongB/public/') ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                    <svg class="w-6 h-6 <?= ($_SERVER['REQUEST_URI'] === '/Projets/KongB/public/') ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="ml-3 sidebar-text">Tableau de bord</span>
                </a>
            </li>
            
            <!-- Clients -->
            <li>
                <a href="<?= PUBLIC_URL ?>customer"
                    class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= (strpos($_SERVER['REQUEST_URI'], 'customer') !== false) ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 <?= (strpos($_SERVER['REQUEST_URI'], 'customer') !== false) ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <span class="ml-3 sidebar-text">Clients</span>
                </a>
            </li>

            <!-- Séances -->
            <li>
                <a href="<?= PUBLIC_URL ?>photo-session"
                    class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= (strpos($_SERVER['REQUEST_URI'], 'photo-session') !== false) ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 <?= (strpos($_SERVER['REQUEST_URI'], 'photo-session') !== false) ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <span class="ml-3 sidebar-text">Séances</span>
                </a>
            </li>

            <!-- Paramètres -->
            <li>
                <a href="<?= PUBLIC_URL ?>settings"
                    class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= (strpos($_SERVER['REQUEST_URI'], 'settings') !== false) ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 <?= (strpos($_SERVER['REQUEST_URI'], 'settings') !== false) ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="ml-3 sidebar-text">Paramètres</span>
                </a>
            </li>
        </ul>

        <!-- Menu utilisateur (bas de sidebar) -->
        <div class="pt-4 mt-auto space-y-2 border-t border-gray-200 dark:border-gray-700 bottom">
            <ul>
                <!-- Profil -->
                <li>
                    <a href="<?= PUBLIC_URL ?>profile"
                        class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= (strpos($_SERVER['REQUEST_URI'], 'profile') !== false) ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                        <svg class="w-6 h-6 <?= (strpos($_SERVER['REQUEST_URI'], 'profile') !== false) ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg> 
                        <span class="ml-3 sidebar-text">Profil</span>
                    </a>
                </li>
                <!-- Déconnexion -->
                <li>
                    <a href="<?= PUBLIC_URL ?>logout"
                        class="flex mt-3 flex items-center justify-center w-full px-4 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <span class="ml-3 sidebar-text">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Effet de flou pour le contenu principal -->
    <div id="contentBlur" class="fixed inset-0 z-40 hidden backdrop-blur-sm md:hidden"></div>
</div>

<script>
 
    const sidebar = document.getElementById('sidebar');
    const sidebarTrigger = document.getElementById('mobileSidebarTrigger');
    const closeSidebar = document.getElementById('closeSidebar');
    const contentBlur = document.getElementById('contentBlur');


    sidebarTrigger.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        contentBlur.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    });

    function closeMobileSidebar() {
        sidebar.classList.add('-translate-x-full');
        contentBlur.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    closeSidebar.addEventListener('click', closeMobileSidebar);
    contentBlur.addEventListener('click', closeMobileSidebar);


    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                closeMobileSidebar();
            }
        });
    });
</script>

<style>

    #sidebar {
        transition: transform 0.3s ease-out, box-shadow 0.3s ease;
    }
    
    #contentBlur {
        transition: opacity 0.3s ease;
    }
    
    @media (min-width: 768px) {
        #mobileSidebarTrigger,
        #closeSidebar,
        #contentBlur {
            display: none;
        }
    }
</style>