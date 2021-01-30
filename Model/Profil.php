

<?php

  class Profil {

    private $email;

    public function __construct($email) {
      $this->email = $email;
    }

    public function getEmail(): string {
      return $this->email;
    }

    public function toString(): string {
      return "Email: ".$this->email;
    }

  }

?>
