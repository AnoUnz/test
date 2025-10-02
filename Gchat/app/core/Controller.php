<?php
namespace App\Core;

class Controller {
    protected function view(string $view, array $data = [], string $layout = 'layouts/main') {
        // Load config app
        $app = require __DIR__ . '/../../config/app.php';
        $data['app'] = $app;

        // Buat variabel dari data array
        extract($data);

        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        // Ambil konten view
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        // Layout lama
        if ($layout === 'layouts/main') {
            require __DIR__ . '/../views/layouts/header.php';
            echo $content;
            require __DIR__ . '/../views/layouts/footer.php';
        } else {
            // Layout lain
            require __DIR__ . '/../views/' . $layout . '.php';
        }
    }
}
