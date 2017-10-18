<?php
namespace core;

abstract class Controller
{
    /**
     * @var string Имя файла с макетом в папке views
     */
    public $layout;

// @var array Параметры, которые передает контроллер представлению для вывода
    public $params = [];

    public function render($view, $params = [])
    {
        if(is_array($params)){
            $this->params = $params;
        }

        $layout = $this->layout;

        //Абсолютный путь к файлу с макетом в папке views
        $fileLayout = VIEWS_DIR . $layout . '.php';
//        echo $fileLayout;

        //Абсолютный путь к файлу фрагмента в папке views
        $fileView = VIEWS_DIR . $view . '.php';
//        echo $fileView;
        if(file_exists($fileLayout) && file_exists($fileView)){
            //Включаем буферизацию вывода.
            //Это необходимо, чтобы html-код вместо вывода на экран
            //Накапливался в буфере
            ob_start();
            require_once $fileLayout;
            $layoutCode = ob_get_clean();
//            echo "$layoutCode";

            ob_start();
            //Получаем фрагмент представления
            require_once $fileView;
            $viewCode = ob_get_clean();
//            echo $viewCode;

            $data = str_replace('<div class="content"></div>', $viewCode, $layoutCode);
            return $data;
        } else {
            throw new \Exception('Layout не существует!' . $fileLayout);
        }
    }
}
//class Controller
//{
//    protected $model;
//    protected $viewFile;
//
//    public function __construct()
//    {
//        $this->model = new Model;
//    }
//
//    public function render() {
//        require_once $this->viewFile;
//    }
//}