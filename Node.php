<?php

class Node{
    private $state = false;

    public function changeState() {
        if ($this->state === false) {
            $this->state = true;
        }
        else $this->state = false;
    }

    public function __toString(): string{
        return ($this->state ? "O" : "X");
    }

    public function getState(): bool {
        return $this->state;
    }

}