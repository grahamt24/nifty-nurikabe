<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/4/2017
 * Time: 3:40 PM
 */

namespace Nurikabe;


class IndexView
{
    private $nurikabe;

    /** Constructor
     * @param $nurikabe Nurikabe game object */
    public function __construct(Nurikabe $nurikabe){
        $this->nurikabe = $nurikabe;
        $this->nurikabe->clearGame();
    }

    /**
     * Create the HTML we present
     * @return string HTML to present the index page
     */
    public function presentNewGame()
    {
        $name = $this->nurikabe->getName();
        $html = <<<HTML
<header>
        <figure><img src="nifty800.png" width="800" height="140" alt="Nifty Nurikabe!">
            <figcaption><a href="instructions.php" target="_blank">INSTRUCTIONS</a></figcaption></figure>
        <h1>
            Welcome to Graham Thomas' Nifty Nurikabe!
        </h1>
</header>
<div class="middle">
    <form class="form" method="post" action="index-post.php">
        <p>
            <label for="name">Name</label>
            <br>
HTML;
            if (is_null($this->nurikabe->getName())) {
                $html .= '<input type="text" name="name" id="name">';
            } else {
                $html .= <<<HTML
<input type="text" name="name" id="name" value=$name>
HTML;
            }
            $html .= <<<HTML
        </p>
        <p>
            <select name="difficulty">
                <option value="3x3ultraeasy">3x3 Ultra Easy</option>
                <option value="8x8veryeasy">8x8 Very Easy</option>
                <option value="10x10easy">10x10 Easy</option>
                <option value="8x8medium">8x8 Medium</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Start Game" name="start">
        </p>
HTML;
        if ($name == " ") {
            $html .= "<p id=message>You must enter a name!</p>";
        }
        $html .= <<<HTML
    </form>
</div>
<footer>
    <p><img src="nifty1-800.png" width="800" height="140" alt="Nifty Nurikabe!"></p>
</footer>
HTML;

            return $html;

        }
}