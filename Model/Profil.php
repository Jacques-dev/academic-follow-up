<?php
  class Profil {

    private $email;
    private $password;
    private $name;
    private $firstname;
    private $school;
    private $td_group;
    private $promo;

    public function __construct($email, $password, $name, $firstname, School $school, TDGroup $td_group, Year $promo) {
      $this->email = $email;
      $this->password = $password;
      $this->name = $name;
      $this->firstname = $firstname;
      $this->school = $school;
      $this->td_group = $td_group;
      $this->promo = $promo;
    }

    public function getEmail(): string {
      return $this->email;
    }
    public function getPassword(): string {
      return $this->password;
    }
    public function getName(): string {
      return $this->name;
    }
    public function getFirstname(): string {
      return $this->firstname;
    }
    public function getSchool(): School {
      return $this->school;
    }
    public function getTdGroup(): TDGroup {
      return $this->td_group;
    }
    public function getPromo(): Year {
      return $this->promo;
    }

    public function toString(): string {
      return "Email : ".$this->email + " password : " + .$this->password + "name : ".$this->name + "firstname : " + .$this->firstname + "school : ".$this->school + "td_group : " + .$this->td_group + "promo : " + .$this->promo;
    }
  }
?>
