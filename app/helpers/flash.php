<?php


if (!isset($_SESSION)) {
    session_start();
}
function Flash($name = '', $message = '', $type = 'danger') {
    $styles = [
        'success' => 'bg-green-100 rounded-xl shadow-md border-l-4 border-green-400 bg text-green-700',
        'danger' => 'bg-red-100 roundexlmd shad-mdow border-l-4 border-red-400 bg text-red-700',
        'warning' => 'bg-yellow-100 rounded-xl shadow-md border-l-4 yellow-green-400 bg text-yellow-700',
        'info' => 'bg-blue-100 roundedxld shado-mdw border-l-4 border-blue-400 bg text-blue-700'
    ];
    
    $class = $styles[$type] ?? $styles['danger'];
    
    $icons = [
        'success' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        'danger' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'warning' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        'info' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
    ];
    
    $iconPath = $icons[$type] ?? $icons['danger'];

    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_type'] = $type;
        } else if(empty($message) && !empty($_SESSION[$name])) {
            $type = $_SESSION[$name.'_type'] ?? $type;
            $class = $styles[$type] ?? $styles['danger'];
            $iconPath = $icons[$type] ?? $icons['danger'];
            
            $html = <<<HTML
            <div class="$class px-4 py-3 rounded relative mb-4 transition-all duration-300" id="alertmsg-$name" role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="$iconPath"/>
                    </svg>
                    <span class="block sm:inline">{$_SESSION[$name]}</span>
                </div>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="document.getElementById('alertmsg-$name').remove()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    const alert = document.getElementById('alertmsg-$name');
                    if (alert) {
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 300);
                    }
                }, 5000);
            </script>
HTML;
            
            echo $html;
            
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_type']);
        }
    }
}