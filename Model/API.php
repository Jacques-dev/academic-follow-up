

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

  public function getSchool() {
    return $this->school;
  }

  public function getSemester() {
    return $this->semester;
  }

  public function getSemesterId($id) {
    foreach ($this->semester as $sem) {
      if ($sem->getId() === $id) {
        return $sem->getNameFromId($id);
      }
    }
  }

  public function getUE() {
    return $this->ue;
  }

  public function getUEId($id) {
    foreach ($this->ue as $ue) {
      if ($ue->getId() === $id) {
        return $ue->getNameFromId($id);
      }
    }
  }

  public function getSubjects() {
    return $this->subject;
  }

  public function getSubjectId($id) {
    foreach ($this->subject as $sub) {
      if ($sub->getId() === $id) {
        return $sub->getNameFromId($id);
      }
    }
  }

  public function getSemesterFromSchool($name) {
    foreach ($this->school as $sch) {
      if ($sch->getName() === $name) {
        return $sch->getNumberOfSemester();
      }
    }
  }

}
?>
