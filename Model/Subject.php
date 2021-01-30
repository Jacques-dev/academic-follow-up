

<?php

  class Subject {

    private $name;

    private $notes = [];

    private $coefficient;

    public function __construct($name, $coefficient) {
      $this->name = $name;
      $this->coefficient = $coefficient;
    }

    public function getId(): string {
      return $this->id;
    }

    public function getNotes(): array {
      return $this->notes;
    }

    public function getCoefficient(): int {
      return $this->coefficient;
    }

    public function add($note, $coef): bool {
      if ($note > 0 && $note != null) {
        if ($coef > 0 && $note != null) {
          $this->notes[$note] => $coef;
          return true;
        }
        return false;
      }
      return false;
    }

    public function getAverage(): float {
      $res = 0;
      foreach ($this->notes as $note) {
        $res += ($note * $this->notes[$note]);
      }
      $res = $res / count($this->notes);
      return $res;
    }

    public function toString(): string {
      return "Nom: ".$this->name."<br>Notes: ".$this->notes."<br>Moyenne: ".$this->getAverage();
    }

  }

?>
