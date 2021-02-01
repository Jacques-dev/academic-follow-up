<?php
  class Year {

    private $year;

    public function getName(): string {
      return $this->year;
    }

    public function toString(): string {
      return "Name : ".$this->year."<br>";
    }
  }
?>
