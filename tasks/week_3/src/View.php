<?php
namespace Core;

class View
{
    private $templatePath = '';

    public function __construct()
    {
        $this->templatePath = PROGECT_ROOT_DIR . DIRECTORY_SEPARATOR . 'app/View';
    }

    public function render($tpl, $data = []): string
    {
        extract($data);
        ob_start();
        include $this->templatePath . DIRECTORY_SEPARATOR . $tpl;
        return ob_get_clean();
    }
}