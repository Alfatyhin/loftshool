<?php
namespace Core;

class Session
{
    public function init()
    {
        session_start();
    }

    public function setValue($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function getValue($name)
    {
        return $_SESSION[$name];
    }

    public function destroy()
    {
        session_destroy();
    }

}
