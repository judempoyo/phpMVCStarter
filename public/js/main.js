
function toggleTheme() {
  const html = document.documentElement;
  html.classList.toggle('dark');
  
  // Sauvegarde du thème
  const isDark = html.classList.contains('dark');
  localStorage.setItem('theme', isDark ? 'dark' : 'light');
  
  // Mise à jour de l'icône
  const themeIcon = document.getElementById('theme-icon');
  themeIcon.setAttribute('d', isDark ? 
    'M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z' : 
    'M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z'
  );
}

// Chargement initial
window.addEventListener('DOMContentLoaded', () => {
  const savedTheme = localStorage.getItem('theme') || 'light';
  document.documentElement.classList.toggle('dark', savedTheme === 'dark');
});


function toggleSidebar() {
  const wrapper = document.getElementById('wrapper');
  wrapper.classList.toggle('sidebar-mini');
  
  const sidebar = document.getElementById('sidebar');
  if (wrapper.classList.contains('sidebar-mini')) {
      sidebar.classList.remove('w-64');
      sidebar.classList.add('w-20');
  } else {
      sidebar.classList.remove('w-20');
      sidebar.classList.add('w-64');
  }
  

  localStorage.setItem('sidebarCollapsed', wrapper.classList.contains('sidebar-mini'));
}


document.addEventListener('DOMContentLoaded', function() {
  const wrapper = document.getElementById('wrapper');
  const sidebar = document.getElementById('sidebar');
  const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
  
  if (isCollapsed) {
      wrapper.classList.add('sidebar-mini');
      sidebar.classList.remove('w-64');
      sidebar.classList.add('w-20');
  }
});

// Fonction pour revenir à la page précédente
function goBack() {
  window.history.back();
}
