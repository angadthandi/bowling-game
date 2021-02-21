<?php

require_once __DIR__ . "/../app/modules/player/player.php";
require_once __DIR__ . "/../app/modules/game/game.php";
require_once __DIR__ . "/../app/modules/gamesession/gamesession.php";

$p1 = new Player("Player 1");
$p2 = new Player("Player 2");
$p3 = new Player("Player 3");

$players = [];
$players[] = $p1;
$players[] = $p2;
$players[] = $p3;

// error_log(print_r($players, true));

$game = new Game;
$gameSessID = $game->createSession($players);

for ($i=0; $i<23; $i++) {
    $score1 = abs(rand() % 10);
    $game->roll($gameSessID, $p1, $score1);

    $score2 = abs(rand() % 10);
    $game->roll($gameSessID, $p2, $score2);

    $score3 = abs(rand() % 10);
    $game->roll($gameSessID, $p3, $score3);
}

$gameSessID_2 = $game->createSession($players); // valid
error_log($gameSessID_2);
$gameSessID_3 = $game->createSession($players); // valid
error_log($gameSessID_3);
$gameSessID_4 = $game->createSession($players); // valid
error_log($gameSessID_4);
$gameSessID_5 = $game->createSession($players); // invalid
error_log($gameSessID_5);

$winner = $game->declareWinner($gameSessID);
error_log("Winner: " . print_r($winner, true));

$gameSessID_6 = $game->createSession($players); // valid
error_log($gameSessID_6);