
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
               <svg class="w-6 h-6 <?= ($_SERVER['REQUEST_URI'] === '/Projets/KongB/public/') ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white sidebar-text">
                <span class="text-teal-500">PHP</span>MVC
            </h1>
        </div>

        <hr class="my-2 border-t border-gray-300 dark:border-gray-600">

        <ul class="space-y-2">
            <li class="mt-6">
                <a href="<?= url('/') ?>"
                    class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= ($_SERVER['REQUEST_URI'] === '/Projets/KongB/public/') ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                    <svg class="w-6 h-6 <?= ($_SERVER['REQUEST_URI'] === '/Projets/KongB/public/') ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="ml-3 sidebar-text">Tableau de bord</span>
                </a>
            </li>

        </ul>

        <div class="pt-4 mt-auto space-y-2 border-t border-gray-200 dark:border-gray-700 bottom">
            <ul>
                <li>
                    <a href="<?= url('/profile') ?>"
                        class="flex items-center p-2 transition-colors duration-200 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 group <?= (strpos($_SERVER['REQUEST_URI'], 'profile') !== false) ? 'bg-teal-50 text-teal-700 dark:bg-gray-700 dark:text-teal-400' : 'text-gray-700 dark:text-gray-300' ?>">
                        <svg class="w-6 h-6 <?= (strpos($_SERVER['REQUEST_URI'], 'profile') !== false) ? 'text-teal-500' : 'text-gray-500 group-hover:text-teal-500 dark:text-gray-400' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg> 
                        <span class="ml-3 sidebar-text">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('/logout') ?>"
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