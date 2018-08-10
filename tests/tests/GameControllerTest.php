<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class GameControllerTest extends \PHPUnit_Framework_TestCase
{
	public function testConstruct(){
	    $game = new \Nurikabe\Nurikabe();
	    $test = new \Nurikabe\GameController($game, $_POST);
	    $this->assertInstanceOf(\Nurikabe\GameController::class, $test);
    }
}

/// @endcond
