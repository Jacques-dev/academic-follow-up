<?php

  class Semester {

    private $num;
    private $ues = [];

    public function __construct($num) {
      $this->num = $num;
    }

    public function getNum(): string {
      return $this->num;
    }

    public function add(UE $ue): bool {
      if ($ue != null) {
        $this->ues[$ue] => $ue.getCoefficient();
        return true;
      }
      return false;
    }

    public function toString(): string {
      return "Num: ".$this->num." ues: ".$this->ues."<br>";
    }

  }

?>
