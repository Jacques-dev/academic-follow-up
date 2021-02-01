<?php

  class UE {

    private $name;

    private $school;

    private $semester;

    private $year;

    private $coefficient;

    private $subjects = [];

    public function getName(): string {
      return $this->name;
    }

    public function getSchool(): string {
      return $this->school;
    }

    public function getSemester(): string {
      return $this->semester;
    }

    public function getYear(): string {
      return $this->year;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function getSubjects(): array {
      return $this->subjects;
    }

    public function add(Subject $subject): bool {
      if ($subject != null) {
        $this->subjects[$subject] = $subject;
        return true;
      }
      return false;
    }

    public function toString(): string {
      return "Name : ".$this->name." school: ".$this->school." semester: ".$this->semester." year: ".$this->year." coefficient: ".$this->coefficient." subjects: ".$this->subjects."<br>";
    }

  }

?>
