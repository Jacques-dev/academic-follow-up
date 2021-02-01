<?php
  class Mark {

    private $mark_type;
    private $coefficient;
    private $mark;

    public function getName(): string {
      return $this->mark_type;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function getMark(): float {
      return $this->mark;
    }

    public function toString(): string {
      return "Name : ".$this->mark_type." coefficient : ".$this->coefficient." mark : ".$this->mark."<br>";
    }
  }
?>
