<?php

class Login
{
  private $_uid;
  private $_ups;

  public function __construct($uid, $ups)
  {
      $this->_uid = $uid;
      $this->_ups = $ups;
  }

  public function changeJob($newjob)
  {
      $this->_job = $newjob;
  }

  public function happyBirthday()
  {
      ++$this->_age;
  }
}

// Create two new people
$person1 = new Person("Tom", "Button-Pusher", 34);
$person2 = new Person("John", "Lever Puller", 41);

// Output their starting point
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";

// Give Tom a promotion and a birthday
$person1->changeJob("Box-Mover");
$person1->happyBirthday();

// John just gets a year older
$person2->happyBirthday();

// Output the ending values
echo "<pre>Person 1: ", print_r($person1, TRUE), "</pre>";
echo "<pre>Person 2: ", print_r($person2, TRUE), "</pre>";

?>
