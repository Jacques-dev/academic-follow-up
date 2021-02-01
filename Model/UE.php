<?php

  class UE {

    private $name;

    private $school;

    private $semester;

    private $year;

    private $coefficient;

    public function __construct($name, $school, $semester, $year, $coefficient) {
      $this->name = $name;
      $this->school = $school;
      $this->semester = $semester;
      $this->year = $year;
      $this->coefficient = $coefficient;
    }

    public function getName(): string {
      return $this->name;
    }

    public function getSchool(): School {
      return $this->school;
    }

    public function getSemester(): Semester {
      return $this->semester;
    }

    public function getYear(): Year {
      return $this->year;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function toString(): string {
      return "Name : ".$this->name." school: ".$this->school." semester: ".$this->semester." year: ".$this->year." coefficient: ".$this->coefficient."<br>";
    }

  }

?>
