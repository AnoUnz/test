<?php
namespace App\Core;

class Controller {
    protected function view(string $view, array $data = [], string $layout = 'layouts/main') {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        // amb view
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        // lay old
        if ($layout === 'layouts/main') {
            require __DIR__ . '/../views/layouts/header.php';
            echo $content;
            require __DIR__ . '/../views/layouts/footer.php';
        } else {
            // lay new
            require __DIR__ . '/../views/' . $layout . '.php';
        }
    }
}
