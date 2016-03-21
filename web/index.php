<?php
/**
 * Created by PhpStorm.
 * User: igortokman
 * Date: 18.03.16
 * Time: 20:42
 */
use Core\Renderer;
use Core\Controller;
use Core\SiteSearch;
use Core\Model;

spl_autoload_register(function($className){
    include '../' . str_replace('\\', '/', $className) . '.php';
});

$Renderer = new Renderer('main');

//Checks if data exists in the Post array, otherwise displays main view
if(isset($_POST['submit'])){
    $ctrl = new Controller(new SiteSearch(str_replace('http://', '', trim($_POST['URL'])), trim($_POST['fileName'])), $Renderer);
    $ctrl->run();
}
else
    $Renderer->render('searchForm');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
</html>
