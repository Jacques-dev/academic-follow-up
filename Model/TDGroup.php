<?php
  class TDGroup {

    private $name;
    private $year;
    private $school;

    public function __construct($name, Year $year, School $school) {
      $this->name = $name;
      $this->year = $year;
      $this->school = $school;
    }

    public function getName(): string {
      return $this->name;
    }

    public function getYear(): Year {
      return $this->year;
    }

    public function getSchool(): School {
      return $this->school;
    }

    public function toString(): string {
      return "Name : ".$this->name." year: ".$this->year." school: ".$this->school."<br>";
    }
  }
?>
