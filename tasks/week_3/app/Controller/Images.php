<?php
namespace App\Controller;

use Core\AbstractController;
use Intervention\Image\ImageManagerStatic as ImageManager;


class Images extends AbstractController
{
    protected static $_imagePath;

    public function __construct()
    {
        self::$_imagePath = $_SERVER['DOCUMENT_ROOT'] . '/loading/images/';
    }

    // разобраться появилась в видео про админа
    public function preAction()
    {

        self::$_imagePath = $_SERVER['DOCUMENT_ROOT'] . '/loading/images/';
    }

    // отображение по индексной странице url
    // сделать здесь выбор изображения из тех которые загружал пользователь
    //
    public function indexAction()
    {
        // сначала нужно получить массив изображений которые пользователь загружал

    }

    // здесь будет обработчик который принимает выбранное фото
    // выводит инструменты обработки и возврщает полученный результат
    // также нужна будет вазможпость сохранить изменения в отдельную функцию
    public function redactorAction()
    {
        self::$_imagePath = $_SERVER['DOCUMENT_ROOT'] . '/loading/images/';
        $source = self::$_imagePath . 'ava.jpg';
        $result = self::$_imagePath . 'new_ava.jpg';

        $image = ImageManager::make($source)
            ->resize(null, 500, function ($image) {
                $image->aspectRatio();
            })
            //->rotate(45)
            //->blur(1)
            ->crop(200, 250)
            //->invert()
            //->greyscale()
            //->fit(400, 100)
            ->save($result, 80);

        //$image->save($result, 80);
        //echo 'success';

        //self::watermark($image);

        echo $image->response('png');
    }

    public static function greyCreatOnce($imageName)
    {
        self::$_imagePath = $_SERVER['DOCUMENT_ROOT'] . '/loading/images/';

        $greyName = 'grey_' . $imageName;

        $source = self::$_imagePath . $imageName;

       // print_r($imageName);

        if (!$imageName) {
            return null;
        } else {
            $result = self::$_imagePath . $greyName;

            if (file_exists($result)) {

                return $greyName;
            } else {
                $image = ImageManager::make($source)
                    ->greyscale()
                    ->save($result, 80);

                $image->save($result, 80);

                return $greyName;
            }
        }

    }

    public static function loadResize($imageName)
    {
        self::$_imagePath = $_SERVER['DOCUMENT_ROOT'] . '/loading/images/';
        $source = self::$_imagePath . "$imageName";
        $result = self::$_imagePath . "$imageName";

        $image = ImageManager::make($source)
            ->resize(null, 300, function ($image) {
                $image->aspectRatio();
            })
            ->crop(200, 200)
            ->save($result, 80);

        //$image->save($result, 80);
    }

}
