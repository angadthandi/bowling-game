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

    public function getID(): int {
        return $this->id;
    }

    public function setPlayers(array $players): void {
        $this->players = $players;
    }

    public function setAlley(int $alley): void {
        $this->alley = $alley;
    }

    public function getAlley(): int {
        return $this->alley;
    }

    public function roll(Player $currPlayer, int $pins): void {
        foreach ($this->players as $player) {
            if ($player->getName() == $currPlayer->getName()) {
                $player->roll($pins);
                break;
            }
        }
    }

    public function calcWinner(): ?Player {
        $winner = null;
        $maxScore = 0;

        foreach ($this->players as $player) {
            if ($player->getCanPlay()) {
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