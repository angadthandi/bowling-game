<?php

require_once __DIR__ . "/../player/player.php";

class GameSession {

    private int $id;
    private int $alley;
    private array $players; // Player[]

    private static int $gameSessIdIncrementor = 0;

    public function __construct() {
        static::$gameSessIdIncrementor++;

        $this->id = static::$gameSessIdIncrementor;
    }

    public function setPlayers(array $players) {
        $this->players = $players;
    }

    public function setAlley(int $alley) {
        $this->alley = $alley;
    }

    public function calcWinner(): ?Player {
        $winner = null;
        $maxScore = 0;

        foreach ($this->players as $player) {
            if ($player->canPlay()) {
                return null;
            }

            if ($player->getScore() > $maxScore) {
                $maxScore = $player->getScore();
                $winner = $player;
            }
        }

        return $winner;
    }

}