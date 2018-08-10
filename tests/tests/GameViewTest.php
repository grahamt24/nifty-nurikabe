<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class GameViewTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct(){
        $game = new \Nurikabe\Nurikabe();
        $test = new \Nurikabe\GameView($game);
        $this->assertInstanceOf(\Nurikabe\GameView::class, $test);
    }
}

/// @endcond
