<?php
require 'lib/game.inc.php';
$view = new \Nurikabe\InstructionsView($nurikabe);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="nurikabe.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Instructions for Nifty Nurikabe</title>
</head>
<body>
<?php
    echo $view->presentInstructions();
?>
</body>
</html>