<?php
  class School {

    private $name;

    public function __construct($name) {
      $this->name = $name;
    }

    public function getName(): string {
      return $this->name;
    }

    public function toString(): string {
      return "Name : ".$this->name."<br>";
    }
  }
?>
