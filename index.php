<?php
include_once "Game.php";
session_start();

if(isset($_GET['reset']) && $_GET['reset'] === "1") {
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

if (isset($_GET['row']) && isset($_GET['col']) && !$gameEnded) {
    $row = (int) $_GET['row'];
    $col = (int) $_GET['col'];

    $game->touchNode($row, $col);
    $gameEnded = $game->checkEndGame();
    $_SESSION['game'] = $game;
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
    <h1 class="title">Nodes Game</h1>
<div class="gamecontainer <?= $gameEnded ? 'locked' : '' ?>">
        <?php foreach($game->getGameGrid() as $rowIndex => $row): ?> 
            <div class="row">
                <?php foreach($row as $colIndex => $node): ?>
                    <a href="index.php?row=<?= $rowIndex ?>&col=<?= $colIndex ?>">
                        <div class="cell">
                            <?php if ($node->getState()): ?>
                                <img src="images/on.png">
                            <?php else: ?>
                                <img src="images/off.png">
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?> 
            </div>
        <?php endforeach; ?>
    </div>
        <?php if ($gameEnded): ?>
        <h2>WINNER WINNER CHICKEN DINNER</h2>
        <?php endif; ?>
    <a href="index.php?reset=1">
        <div class="reset">
            <p>RESET</p>;
        </div> 
    </a> 


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
