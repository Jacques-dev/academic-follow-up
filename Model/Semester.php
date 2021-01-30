<?php

  class Semester {

    private $ues = [];

    public function add(UE $ue): bool {
      if ($ue != null) {
        $this->ues[$ue] => $ue.getCoefficient();
        return true;
      }
      return false;
    }

    public function getAverage(): float {
      $res = 0;
      foreach ($this->ues as $ue) {
        $res += ($ue.getAverage() * $this->ues[$ue.getCoefficient()]);
      }
      $res = $res / count($this->ues);
      return $res;
    }

    public function toString(): string {
      return "Moyenne: ".$this->getAverage();
    }

  }

?>
