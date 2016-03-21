<?php
/**
 * Created by PhpStorm.
 * User: igortokman
 * Date: 21.03.16
 * Time: 0:33
 */

namespace Core;

class Controller
{
    public $monitor;
    public $renderer;

    /**
     * Controller constructor.
     */
    public function __construct(SiteSearch $monitor, Renderer $renderer)
    {
        $this->renderer = $renderer;
        $this->monitor = $monitor;
    }

    /**
     * Starts verification process and displays view
     */
    public function run(){
        $model = new Model($this->monitor);
        $inspections = $model->checkOut();

        $this->renderer->render('result',$inspections);
    }


}