

<?php

class API {

  private $school;
  private $semesters;
  private $subject;
  private $td_group;
  private $ue;
  private $year;
  private $mark_type;

  public function setAttribute($attribute_array, $attribute_name) {

    $allAttributes = [
      "school",
      "semesters",
      "subject",
      "td_group",
      "ue",
      "year",
      "mark_type"
    ];

    foreach ($allAttributes as $attr) {
      if ($attribute_name === $attr) {
        $this->$attr = $attribute_array;
      }
    }

  }

  public function getAttribute($attribute) {
    $allAttributes = [
      "school",
      "semesters",
      "subject",
      "td_group",
      "ue",
      "year",
      "mark_type"
    ];

    $attributesRes = [
      "school" => $this->school,
      "semesters" => $this->semesters,
      "subject" => $this->subject,
      "td_group" => $this->td_group,
      "ue" => $this->ue,
      "year" => $this->year,
      "mark_type" => $this->mark_type
    ];

    foreach ($allAttributes as $attr) {
      if ($attribute === $attr) {
        return $attributesRes[$attr];
      }
    }

  }

}




?>
