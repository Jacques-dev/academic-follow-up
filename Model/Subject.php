<?php

  class Subject {

    private $name;

    private $coefficient;

    private $ue;

    public function getName(): string {
      return $this->name;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function getUE(): string {
      return $this->ue;
    }

    public function toString(): string {
      return "Name: ".$this->name." coefficient: ".$this->coefficient." ue: ".$this->ue."<br>";
    }

  }

?>
