<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/5/2017
 * Time: 12:06 PM
 */

namespace Nurikabe;


class GameView
{
    private $nurikabe;

    public function __construct(Nurikabe $nurikabe){
        $this->nurikabe = $nurikabe;
    }

    public function presentGame(){
        $name = $this->nurikabe->getName();
        $html = <<<HTML
<header>
    <figure><img src="nifty800.png" width="800" height="140" alt="Nifty Nurikabe!">
        <figcaption><a href="./">NEW GAME</a> <a href="instructions.php" target="_blank">INSTRUCTIONS</a></figcaption></figure>

    <h1>
        Greetings, $name, and welcome to Nifty Nurikabe!
    </h1>
</header>

HTML;
        $json = $this->nurikabe->getGameJson();

        $html .= <<<HTML
<div class="middle">
<div id="game"></div>
<script>
    $(document).ready(function() {
        new Game("#game", '$json');
    });
</script>
</div>
<footer>
    <p><img src="nifty1-800.png" width="800" height="140" alt="Nifty Nurikabe!"></p>
</footer>
HTML;

        return $html;

    }

};