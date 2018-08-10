<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct(){
        $game = new \Nurikabe\Nurikabe();
        $test = new \Nurikabe\IndexController($game, $_POST);
        $this->assertInstanceOf(\Nurikabe\IndexController::class, $test);
    }
}

/// @endcond
