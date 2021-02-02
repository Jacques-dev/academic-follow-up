<?php

  class Semester {

    private $num;
    private $school;

    public function getName(): string {
      return $this->num;
    }

    public function getSchool(): string {
      return $this->school;
    }

    public function toString(): string {
      return "Num: ".$this->num." school: ".$this->school."<br>";
    }

  }

?>
