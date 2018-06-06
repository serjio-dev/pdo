<?php
/**
 * User: Serhii T.
 * Date: 6/4/18
 */

namespace App\Controller;

class Controller
{
    protected static $dirViews = 'views/';

    /**
     * @param string $viewName
     * @param array $params
     * @return string
     */
    protected function renderLayout($viewName = '', array $params = []): string
    {
        $viewFile = self::$dirViews.$viewName.'.php';
        extract($params, EXTR_REFS);

        ob_start();
        require $viewFile;
        $content = ob_get_clean();
        ob_end_clean();

        ob_start();
        require self::$dirViews.'layout.php';

        return ob_get_flush();
    }

    /**
     * @param string $content
     * @return string
     */
    protected function render(string $content): string
    {
        ob_start();
        require self::$dirViews.'layout_empty.php';

        return ob_get_flush();
    }
}
