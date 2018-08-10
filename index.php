<?php
require 'lib/game.inc.php';
$view = new \Nurikabe\IndexView($nurikabe);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="nurikabe.css" type="text/css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>Nifty Nurikabe</title>
</head>
<body>
<?php
echo $view->presentNewGame();
?>
</body>
</html>