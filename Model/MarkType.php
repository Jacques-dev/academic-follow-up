<?php
  class MarkType {

    private $mark_type;

    public function getName(): string {
      return $this->mark_type;
    }

    public function toString(): string {
      return "Name : ".$this->mark_type."<br>";
    }
  }
?>
