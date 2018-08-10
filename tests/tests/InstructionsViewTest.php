<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class InstructionsViewTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct(){
        $game = new \Nurikabe\Nurikabe();
        $test = new \Nurikabe\InstructionsView($game);
        $this->assertInstanceOf(\Nurikabe\InstructionsView::class, $test);
    }
}

/// @endcond
