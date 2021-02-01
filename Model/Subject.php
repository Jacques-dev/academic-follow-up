<?php

  class Subject {

    private $name;

    private $markType = [];

    private $coefficient;

    public function getName(): string {
      return $this->name;
    }

    public function getMarkType(): array {
      return $this->markType;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function toString(): string {
      return "Name: ".$this->name." markType: ".$this->markType." coefficient: ".$this->coefficient."<br>";
    }

  }

?>
