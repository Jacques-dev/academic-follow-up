<?php

  class UE {

    private $name;

    private $school;

    private $semester;

    private $coefficient;

    private $level;

    public function getName(): string {
      return $this->name;
    }

    public function getSchool(): string {
      return $this->school;
    }

    public function getSemester(): string {
      return $this->semester;
    }

    public function getCoefficient(): float {
      return $this->coefficient;
    }

    public function getLevel(): string {
      return $this->level;
    }

    public function toString(): string {
      return "Name : ".$this->name." school: ".$this->school." semester: ".$this->semester." coefficient: ".$this->coefficient." level: ".$this->level."<br>";
    }

  }

?>
