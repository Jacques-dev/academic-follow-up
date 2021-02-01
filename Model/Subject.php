<?php

  class Subject {

    private $name;

    private $marks = [];

    private $coefficient;

    public function getName(): string {
      return $this->name;
    }

    public function getMarks(): array {
      return $this->marks;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function add(Mark $mark): bool {
      if ($mark != null) {
        array_push($this->marks, $mark);
        return true;
      }
      return false;
    }

    public function toString(): string {
      return "Name: ".$this->name." markType: ".$this->markType." coefficient: ".$this->coefficient."<br>";
    }

  }

?>
