<?php
  class TDGroup {

    private $td_group;
    private $year;
    private $school;

    public function getName(): string {
      return $this->td_group;
    }

    public function getYear(): Year {
      return $this->year;
    }

    public function getSchool(): School {
      return $this->school;
    }

    public function toString(): string {
      return "Name : ".$this->td_group." year: ".$this->year." school: ".$this->school."<br>";
    }
  }
?>
