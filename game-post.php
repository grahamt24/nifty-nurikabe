<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/4/2017
 * Time: 4:04 PM
 */
require 'lib/game.inc.php';
$controller = new \Nurikabe\GameController($nurikabe, $_POST);
if($controller->solved()){
    header("location: solved.php");
    exit;
}
if($controller->verifySolve()){
    $nurikabe->setWantsToSolve(true);
}
if($controller->verifyClear()){
    $nurikabe->setWantsToClear(true);
}
header("location: game.php");
exit;