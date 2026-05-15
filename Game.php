<?php
require_once "Node.php";

class Game {
    private $gameGrid = [];
    private const ROWS = 4;
    private const COLUMNS = 4;
    private const DIRECTIONS = [
        [1, 0],
        [-1,0],
        [0, 1],
        [0, -1]
    ];

    public function __construct() {
        $this->createGameGrid();
    }

    public function getGameGrid(): array {
        return $this->gameGrid;
    }

    private function createGameGrid() {
        for ($i = 0; $i < self::ROWS; $i++ ) {
            for ($j = 0; $j < self::COLUMNS; $j++) {
                $this->gameGrid[$i][$j] = new Node();
            }
        }
    }

    function showGameGrid () {
        foreach($this->gameGrid as $row) {
            foreach($row as $node) {
                echo $node;
            }
            echo "\n";
        }
    }

    public function touchNode ($row, $col) {
        if ($this->verifyNodeExists($row, $col)) {
            $this->gameGrid[$row][$col]->changeState();
            $this->changeAdjacent($row, $col);
        }
    }


    public function verifyNodeExists($row, $col): bool {
        if ($row < 0 || $row >= self::ROWS || $col < 0 || $col >= self::COLUMNS) {
            return false;
        }
        else return true;
    }

    public function changeAdjacent($row, $col) {
        foreach(self::DIRECTIONS as [$rowOffSet, $colOffSet]) {
            $newRow = $row + $rowOffSet;
            $newCol = $col + $colOffSet;
            if(!$this->verifyNodeExists($newRow, $newCol)){
               continue; 
            }
            $this->gameGrid[$newRow][$newCol]->changeState();
        }
    }

    public function checkEndGame(): bool{
        foreach ($this->gameGrid as $row) {
            foreach ($row as $node){
                if (!$node->getState()){
                    return false;
                }
            }
        }
        return true;
    }
}

