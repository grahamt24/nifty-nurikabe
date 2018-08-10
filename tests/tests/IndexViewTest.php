<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class IndexViewTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct(){
        $game = new \Nurikabe\Nurikabe();
        $test = new \Nurikabe\IndexView($game);
        $this->assertInstanceOf(\Nurikabe\IndexView::class, $test);
    }
}

/// @endcond
