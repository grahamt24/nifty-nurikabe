<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/4/2017
 * Time: 5:32 PM
 */
require 'lib/game.inc.php';
$controller = new \Nurikabe\IndexController($nurikabe, $_POST);
if($controller->errored()){
    $nurikabe->setName(" ");
    header("location: ./");
    exit;
}
$nurikabe->setUpGameBoard();
$nurikabe->setSolution();
header("location: game.php");
exit;