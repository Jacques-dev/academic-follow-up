

<?php

  class Profil {

    private $id;

    private $password;

    public function __construct($id, $password) {
      $this->id = $id;
      $this->password = $password;
    }

    public function getId(): string {
      return $this->id;
    }

    public function toString(): string {
      return "Email: ".$this->id;
    }

  }

?>
