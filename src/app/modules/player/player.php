<?php

class Player {

    private const MAX_ROLLS_ALLOWED = 23;
    private const MAX_PINS = 10;

    private string $name;
    private int $score;
    private array $rolls; // Assoc Array/Map -> { rollIdx : PinsNailed }
    private int $currRoll;
    private bool $firstRoll;
    private bool $canPlay;

    public function __construct(string $name) {
        $this->name = $name;
        $this->score = 0;
        $this->currRoll = 0;
        $this->firstRoll = true;
        $this->canPlay = true;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function getCanPlay(): bool {
        if ($this->currRoll <= (static::MAX_ROLLS_ALLOWED - 1)) {
            $this->canPlay = true;
        } else {
            $this->canPlay = false;
        }

        return $this->canPlay;
    }

    public function roll(int $pins): void {
        if(!$this->getCanPlay()) {
            error_log("cannot play");
            return;
        }

        if ($this->firstRoll && $pins==static::MAX_PINS) {
            $pins += 10;
        }

        $this->firstRoll = false;

        $this->currRoll += 1;
        $this->score += $pins;
    }

}