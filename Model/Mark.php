<?php
  class Mark {

    private $mark;
    private $type;
    private $id_student;
    private $coefficient;
    private $id_subject;


    public function getMark(): float {
      return $this->mark;
    }

    public function getType(): float {
      return $this->type;
    }

    public function getIdStudent(): int {
      return $this->id_student;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function getIdSubject(): int {
      return $this->id_subject;
    }

    public function toString(): string {
      return "Mark : ".$this->mark." type : ".$this->type." id_student : ".$this->id_student." coefficient : ".$this->coefficient." id_subject : ".$this->id_subject."<br>";
    }
  }
?>
