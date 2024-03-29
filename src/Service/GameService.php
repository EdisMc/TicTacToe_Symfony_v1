<?php

namespace App\Service;

class GameService
{
    public string $player = "X";
    public array $board = [];

    public function checkGameResult()
    {
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[$i][0] != ''
                && $this->board[$i][0] === $this->board[$i][1]
                && $this->board[$i][1] === $this->board[$i][2]) {
                return $this->board[$i][0];
            }
        }

        for ($i = 1; $i < 3; $i++) {
            if ($this->board[0][$i] != ''
                && $this->board[0][$i] === $this->board[1][$i]
                && $this->board[1][$i] === $this->board[2][$i]) {
                return $this->board[0][$i];
            }
        }

        if ($this->board[0][0] != ''
            && $this->board[0][0] === $this->board[1][1]
            && $this->board[1][1] === $this->board[2][2]) {
            return $this->board[0][0];
        }

        if ($this->board[0][2] != ''
            && $this->board[0][2] === $this->board[1][1]
            && $this->board[1][1] === $this->board[2][0]) {
            return $this->board[0][2];
        }
    }

    public function showWinner(): string
    {

        return 'The winner is : ' . $this->checkGameResult();

    }

    public function gameStatus(): bool
    {
        if ($this->checkGameResult() !== '') {
            return false;
        }

        $emptyCell = 0;

        foreach ($this->board as $row) {
            foreach ($row as $cell) {
                if ($cell === '') {
                    $emptyCell++;
                }
            }
        }

        return $emptyCell === 0;
    }

}