<?php
namespace App\Core;

trait ViewRenderer
{
    protected function render(string $layoutpath, string $viewPath, array $data = [], bool $useLayout = true)
    {


        extract($data);
        ob_start();
        require __DIR__ . "/../../app/Views/$viewPath.php";
        $content = ob_get_clean();
        
        if ($useLayout) {
            include __DIR__ . "/../../app/Views/layouts/$layoutpath.php";
        } else {
            echo $content;
        }
    }
}