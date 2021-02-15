<?php
namespace Core;

class View
{
    private $templatePath = '';
    private $data = [];

    public function __construct()
    {
        $this->templatePath = PROGECT_ROOT_DIR . DIRECTORY_SEPARATOR . 'app/View';
    }
    public function assign($data)
    {
        if (isset($data)) {
            foreach ($data as $key => $value) {
                $this->data[$key] = $value;
            }
        }
    }


    public function render($tpl, $data = [])//: string
    {
        extract($data);
        ob_start();
        include $this->templatePath . DIRECTORY_SEPARATOR . $tpl;
        return ob_get_clean();
    }
}