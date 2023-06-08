<?php
require_once 'game.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabacc</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="game">
        <?= $_SESSION['round'] <= 3 ? '<h2>Score: '.$_SESSION['total'].'</h2>' : '<h1>Final Score: '. $_SESSION['total'].'</h1>' ?>
        <div class="cards">
            <div class="hand-area">
                <?php foreach ($_SESSION['hand'] as $card) : ?>
                    <div class="card">
                        <p class="card-text"><?= $card ?></p>
                        <?php if ($_SESSION['round'] <= 3) : ?>
                            <div class="card-options">
                                <form action="play.php" method="post">
                                    <input type="hidden" name="card" value="<?= (int)$card ?>">
                                    <input type="submit" name="submit" value="Play">
                                </form>
                                <form action="trade.php" method="post">
                                    <input type="hidden" name="card" value="<?= (int)$card ?>">
                                    <input type="submit" name="submit" value="Trade">
                                </form>
                                <form action="throw.php" method="post">
                                    <input type="hidden" name="card" value="<?= (int)$card ?>">
                                    <input type="submit" name="submit" value="Throw">
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="board-area">
                <?php foreach ($_SESSION['board'] as $card) : ?>
                    <div class="card played-card">
                        <p class="card-text"><?= $card ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <h3><?= $_SESSION['round'] <= 3 ? 'Turn '.$_SESSION['round'].'/3'  : 'Game Over' ?></h3>
        <div class="action-area">
            <?php if ($_SESSION['round'] <= 3) : ?>
                <form action="new_card.php" method="post">
                    <input type="submit" name="submit" value="New Card">
                </form>
                <form action="stand.php" method="post">
                    <input type="submit" name="submit" value="Stand">
                </form>
            <?php endif; ?>
            <form action="new_game.php" method="post">
                <input type="submit" name="submit" value="New Game">
            </form>
        </div>
        <div class="history">
            <p class="idiots">Idiot Arrays: - <?= $_SESSION['idiots'] ?></p>
            <p class="bombs">Bomb outs: --- <?= $_SESSION['bombs'] ?></p>
            <div class="highscore">
                <p>Highscores:</p>
                <?php foreach ($_SESSION['highscore'] as $total) : ?>
                    <p><?= $total ?></p>
                <?php endforeach; ?>
            </div>
        </div>  
    </div>

</body>

</html>