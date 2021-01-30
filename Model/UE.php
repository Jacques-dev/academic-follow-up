

<?php

  class UE {

    private $name;

    private $subjects = [];

    private $coefficient;

    public function __construct($name, $coefficient) {
      $this->name = $name;
      $this->coefficient = $coefficient;
    }

    public function getName(): string {
      return $this->name;
    }

    public function getNotes(): array {
      return $this->subjects;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function add(Subject $subject): bool {
      if ($subject != null) {
        $this->subjects[$subject] => $subject.getCoefficient();
        return true;
      }
      return false;
    }

    public function getAverage(): float {
      $res = 0;
      foreach ($this->subjects as $subject) {
        $res += ($subject.getAverage() * $this->subjects[$subject.getCoefficient()]);
      }
      $res = $res / count($this->subjects);
      return $res;
    }

    public function toString(): string {
      return "Nom: ".$this->name."<br>Matières: ".$this->subjects."<br>Moyenne: ".$this->getAverage();
    }

  }

?>
