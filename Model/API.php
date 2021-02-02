

<?php

class API {

  private $school;
  private $semester;
  private $subject;
  private $td_group;
  private $ue;
  private $promotion;
  private $mark_type;

  public function setAttribute($attribute_array, $attribute_name) {

    $allAttributes = [
      "school",
      "semester",
      "subject",
      "td_group",
      "ue",
      "promotion",
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
      "semester",
      "subject",
      "td_group",
      "ue",
      "promotion",
      "mark_type"
    ];

    $attributesRes = [
      "school" => $this->school,
      "semester" => $this->semester,
      "subject" => $this->subject,
      "td_group" => $this->td_group,
      "ue" => $this->ue,
      "promotion" => $this->promotion,
      "mark_type" => $this->mark_type
    ];

    foreach ($allAttributes as $attr) {
      if ($attribute === $attr) {
        return $attributesRes[$attr];
      }
    }
  }

  public function getSemester() {
    return $this->semester;
  }

  public function getUE() {
    return $this->ue;
  }

  public function getSubjects() {
    return $this->subject;
  }

}
?>
