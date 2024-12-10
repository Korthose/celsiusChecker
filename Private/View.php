<?php

class View
{

    public static function render(string $viewName, $data)
    {
        $basePath = __DIR__ . "/../..";

        ob_start();
        extract($data);
        require ($basePath.'/'.$viewName);
        $content = ob_get_clean();
        require $basePath.'/Public/Views/index.php';
        return "";
    }
}