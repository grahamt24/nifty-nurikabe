<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/5/2017
 * Time: 2:17 PM
 */

namespace Nurikabe;


class InstructionsView
{

    private $nurikabe;

    public function __construct(Nurikabe $nurikabe){
        $this->nurikabe = $nurikabe;
    }
    // Presents the instructions for the game.
    public function presentInstructions(){
        $html = <<<HTML
<header>
    <figure><img src="nifty800.png" width="800" height="140" alt="Nifty Nurikabe!">
        <figcaption><a href="./">NEW GAME</a></figcaption>
    <h1>
        Nifty Nurikabe Instructions
    </h1>
</header>
<div class="middle">
    <div class="instructions">
        <article>
            <figure><img src="example1.png" width="411" height="411" alt="Partially Solved Nurikabe!"></figure>
            <h2>Rules</h2>
            <p>The game of Nurikabe is played on a rectangular grid of cells. Some cells contain numbers.
                When the game begins, all cells, other than the numbered cells, are empty, which is indicated by a cell
                filled with white. Game play consists of setting each cell to either an <span class="italics">island</span>
                or the <span class="italics">sea</span>.</p>
            <p>Islands are indicated by either cells with a number in them or cells with a dot. Every island has exactly
                one numbered cell that indicates how many cells there are in that island. Cells in an island are all
                connected horizontally or vertically.</p>
            <p>The sea is colored blue. A cell that is set to be part of the sea is filled with blue.
                There are two rules about the:</p>
            <ol type="1">
                <li>The sea is contiguous, meaning every sea cells is adjacent horizontally or vertically to another sea cell.</li>
                <li>No "pools" are allowed. A pool is a 2 by 2 area of sea.</li>
            </ol>
            <p>Nurikabe solutions are unique. There is only one possible solution to any given game.</p>
            <h2>How to Play</h2>
            <p>Game play proceeds by clicking on cells. Each click toggles a cell from empty to sea to island. For
                example, if an empty cell is clicked on, it becomes sea. If sea is clicked on, it becomes an island. If
                an island cell is clicked on, it becomes empty. Cells with numbers in them are automatically island
                cells and are not clickable at all.</p>
            <h2>Links</h2>
            <ul>
                <li><a href="https://en.wikipedia.org/wiki/Nurikabe">Wikipedia page on Nurikabe</a></li>
                <li><a href="http://dl.acm.org/citation.cfm?id=2362108">Computational Complexity of Nurikabe</a> </li>
            </ul>
        </article>
    </div>
</div>

<footer>
    <p><img src="nifty1-800.png" width="800" height="140" alt="Nifty Nurikabe!"></p>
</footer>
HTML;

        return $html;
    }

}