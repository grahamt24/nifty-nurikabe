<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/5/2017
 * Time: 1:18 PM
 */

namespace Nurikabe;


class SolvedView
{
    private $nurikabe;

    public function __construct(Nurikabe $nurikabe){
        $this->nurikabe = $nurikabe;
    }

    public function presentSolved(){
        $name = $this->nurikabe->getName();
        $difficulty = $this->nurikabe->getDifficulty();

        $html = <<<HTML
<header>
    <figure><img src="nifty800.png" width="800" height="140" alt="Nifty Nurikabe!">
        <figcaption><a href="./">NEW GAME</a> <a href="instructions.php">INSTRUCTIONS</a></figcaption></figure>

    <h1>
        Congratulations, $name, you solved Nifty Nurikabe!
    </h1>
</header>
<div class="middle">
HTML;
        if($difficulty == "3x3ultraeasy"){
            $html .= $this->present3x3UltraEasySolved();
        }
        elseif($difficulty=="8x8veryeasy"){
            $html .= $this->present8x8VeryEasySolved();
        }
        elseif($difficulty=="10x10easy"){
            $html .= $this->present10x10EasySolved();
        }
        elseif($difficulty=="8x8medium"){
            $html .= $this->present8x8MediumSolved();
        }

        $html .= <<<HTML
    <p><br>You're a winner!</p>
</div>
<footer>
    <p><img src="nifty1-800.png" width="800" height="140" alt="Nifty Nurikabe!"></p>
</footer>
HTML;

        return $html;
    }

    public function present3x3UltraEasySolved(){
        $html = <<<HTML
<table class="game">
        <tr>
            <td class="cell none">1</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">1</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class="cell none">2</td>
            <td class="cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
</table>

HTML;
        return $html;
    }

    public function present8x8VeryEasySolved(){
        $html = <<<HTML
    <table class="game">
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class="cell none">1</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">4</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class="cell none">4</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
        </tr>
        <tr>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class="cell none">3</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">3</td>
        </tr>
        <tr>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class="cell none">3</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
        </tr>
    </table>
HTML;
        return $html;
    }

    public function present10x10EasySolved(){
        $html = <<<HTML
    <table class="game">
        <tr>
            <td class="cell none">4</td>
            <td class="cell none">&#9679;</td>
            <td class="cell none">&#9679;</td>
            <td class="cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">1</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">3</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">3</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">3</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class="cell none">1</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">4</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">3</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">5</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">1</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class="cell none">4</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">3</td>
            <td class=""cell none">&#9679;</td>
            <td class=""cell none">&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
        </tr>
         <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=""cell none">&#9679;</td>
        </tr>
    </table>
HTML;
        return $html;

    }

    public function present8x8MediumSolved(){
        $html = <<<HTML
    <table class="game">
        <tr>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td>&#9679;</td>
            <td>&#9679;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class="cell none">4</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">6</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
        </tr>
        <tr>
            <td class=sea>&nbsp;</td>
            <td class="cell none">2</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td class="cell none">5</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class="cell none">4</td>
            <td>&#9679;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
        </tr>
        <tr>
            <td>&#9679;</td>
            <td>&#9679;</td>
            <td>&#9679;</td>
            <td>&#9679;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
            <td class=sea>&nbsp;</td>
        </tr>
    </table>
HTML;
        return $html;
    }

}