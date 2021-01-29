<?php
namespace Core;

abstract class AbstractController
{
    /** @var View */
    protected $view;

    protected function redirect(string $url)
    {
        throw new RouteExeption($url);
    }

    /**
     * @param View $view
     */
    public function setView(View $view)
    {
        $this->view = $view;
    }
}
