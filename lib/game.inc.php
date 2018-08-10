<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/4/2017
 * Time: 3:44 PM
 */
require __DIR__ . "/../vendor/autoload.php";

//start the PHP session system
session_start();

define("NURIKABE_SESSION", 'nurikabe');

// If there is a Wumpus session, use that. Otherwise, create one
if(!isset($_SESSION[NURIKABE_SESSION])) {
    $_SESSION[NURIKABE_SESSION] = new Nurikabe\Nurikabe();
}

$nurikabe = $_SESSION[NURIKABE_SESSION];