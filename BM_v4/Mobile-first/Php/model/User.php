<?php
require_once 'bmModel.php';

/**
 * The user's class
 */
class Users extends bmModel
{

  private $user_id;
  private $login;
  private $password;

  public function __construct($user_id, $login, $password)
  {
    $this->user_id = $user_id;
    $this->login = $login;
    $this->password = $password;
  }

  public function __construct() {
    $db = dbConnect();
    $sth = $db->query("SELECT * FROM users");
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Users');
    $person = $sth->fetch();
    $person->testInfo();
  }

  public function getLogin() {
    return $this->login;
  }

  public function getID() {
    return $this->user_id;
  }

  public testInfo() {
    echo "Login : ".$this->login . " id : " . $this->id;
  }
}
