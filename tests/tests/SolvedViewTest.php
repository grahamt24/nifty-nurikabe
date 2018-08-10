<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class SolvedViewTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct(){
        $game = new \Nurikabe\Nurikabe();
        $test = new \Nurikabe\SolvedView($game);
        $this->assertInstanceOf(\Nurikabe\SolvedView::class, $test);
    }
}

/// @endcond
