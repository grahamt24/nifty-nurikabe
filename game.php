<?php
require 'lib/game.inc.php';
if(is_null($nurikabe->getGameBoard())){
    header("location: ./");
    exit;
}
$view = new \Nurikabe\GameView($nurikabe);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="nurikabe.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Nifty Nurikabe Game</title>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="site.min.js"></script>
</head>
<body>
<?php
    echo $view->presentGame();
?>
</body>
</html>