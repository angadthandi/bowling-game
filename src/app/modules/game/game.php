<?php

require_once __DIR__ . "/../gamesession/gamesession.php";

require_once __DIR__ . "/../player/player.php";

class Game {

    private array $alleys = [1,2,3,4];
    private array $mapGameSessIDGameSess; // { gameSessID: gameSess }

    public function __construct() {}

    public function createSession(array $players): int {
        if (count($this->alleys)==0) {
            error_log("no alleys available");
            return -1;
        }

        $gameSess = new GameSession();
        $gameSess->setAlley(array_pop($this->alleys));
        $gameSess->setPlayers($players);

        $this->mapGameSessIDGameSess[ $gameSess->getID() ] = $gameSess;
        return $gameSess->getID();
    }

    public function roll(int $gameSessID, Player $player, int $pins): void {
        $gameSess = $this->mapGameSessIDGameSess[ $gameSessID ];
        $gameSess->roll($player, $pins);
    }

    public function declareWinner(int $gameSessID): ?Player {
        $gameSess = $this->mapGameSessIDGameSess[ $gameSessID ];
        $winner = $gameSess->calcWinner();

        if (empty($winner)) {
            error_log("no winner yet!");
            return null;
        }

        $this->_makeAlleyActive($gameSess->getAlley());

        return $winner;
    }

    private function _makeAlleyActive(int $alley): void {
        $this->alleys[] = $alley;
    }

}