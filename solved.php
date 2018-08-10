<?php
require 'lib/game.inc.php';
$view = new \Nurikabe\SolvedView($nurikabe);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="nurikabe.less" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Solved Nifty Nurikabe</title>
</head>
<body>
<?php
    echo $view->presentSolved();
?>
</body>
</html>