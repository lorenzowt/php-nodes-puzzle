<?php
include_once "Game.php";
session_start();

if(isset($_POST['reset']) && $_POST['reset'] === "1") {
    unset($_SESSION['game']);
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['game'])) {
    $game = $_SESSION['game'];
}
else {
    $game = new Game();
    $_SESSION['game'] = $game;
}

$gameEnded = $game->checkEndGame();

if (isset($_POST['row']) && isset($_POST['col']) && !$gameEnded) {
    $row = (int) $_POST['row'];
    $col = (int) $_POST['col'];

    $game->touchNode($row, $col);
    $gameEnded = $game->checkEndGame();
    $_SESSION['game'] = $game;
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NodesGame</title>
</head>
<body>
    <h1 class="title">Nodes Puzzle</h1>
<div class="gamecontainer <?= $gameEnded ? 'locked' : '' ?>">
        <?php foreach($game->getGameGrid() as $rowIndex => $row): ?> 
            <div class="row">
                <?php foreach($row as $colIndex => $node): ?>
                   <form method="POST" action="index.php">
                        <input type="hidden" name="row" value="<?= $rowIndex ?>">
                        <input type="hidden" name="col" value="<?= $colIndex ?>">
                        <button type="submit" class="cell">
                            <?php if ($node->getState()): ?>
                                <img src="images/on.png">
                            <?php else: ?>
                                <img src="images/off.png">
                            <?php endif; ?>
                            </button>
                    </form>
                <?php endforeach; ?> 
            </div>
        <?php endforeach; ?>
    </div>
        <?php if ($gameEnded): ?>
        <h2>WINNER WINNER CHICKEN DINNER</h2>
        <?php endif; ?>
    <form method="POST" action="index.php">
        <button type="submit" name="reset" value="1" class="reset">
            <p>RESET</p>
        </button> 
    </form> 

</body>
</html>

<!-- 
$game = new Game();
$game->showGameGrid();
$game->touchNode(1,1);
echo "\n";
$game->showGameGrid();
$game->touchNode(2,1);
echo "\n";
$game->showGameGrid(); -->
