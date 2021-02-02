<?php
namespace Core;

class RandNameFile extends \SplFileInfo
{

    public function __construct($file_name)
    {
        parent::__construct($file_name);
    }

    public function generateName()
    {
        $type = $this->getExtension();
        $name = $this->getFilename();
        $name = md5(time() . mt_rand(1, 10000) . $name) . '.' . $type;

        return $name;
    }
}
