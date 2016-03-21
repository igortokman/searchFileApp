<?php
/**
 * Created by PhpStorm.
 * User: igortokman
 * Date: 20.03.16
 * Time: 22:32
 */

namespace Core;


class Renderer
{
    /**
     * @var string Main wrapper template
     */
    private $main_template = '';

    /**
     * Renderer constructor
     * @param $main_template
     */
    public function __construct($main_template){
        $this->main_template = $main_template .'.php';
    }

    /**
     * Render specified template file with data provided
     * @param $view Template file
     * @param null $data Data array
     * @param bool|true $wrap To be wrapped with main template if true
     */
    public function render($view, $data = null, $wrap = true){

        ob_start() ;
        include $this->getViewPath($view .'.php');
        $content = ob_get_clean() ;

        if($wrap)
            include $this->getViewPath($this->main_template);
        else
            echo $content;
    }

    /**
     * Returns the full path to the views folder
     * @param $tmp
     * @return string
     */
    private function getViewPath($tmp){
        return '../web/view/' . $tmp;
    }
}