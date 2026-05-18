<?php

namespace App\Core;

class Controller {
    public function view($view, $data = [], $layout = 'main') {
        extract($data);
        
        // Cấp content của page vào buffer
        ob_start();
        $viewPath = __DIR__ . '/../../views/pages/' . $view . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View not found: " . $viewPath);
        }
        $content = ob_get_clean();
        
        // Render layout và truyền $content vào
        $layoutPath = __DIR__ . '/../../views/layouts/' . $layout . '.php';
        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            die("Layout not found: " . $layoutPath);
        }
    }
}
