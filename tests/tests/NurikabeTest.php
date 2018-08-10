<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class NurikabeTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct(){
        $game = new \Nurikabe\Nurikabe();
        $this->assertInstanceOf(\Nurikabe\Nurikabe::class, $game);
    }
}

/// @endcond
