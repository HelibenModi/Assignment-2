<?php


require_once('database.php');

class User {
  public function get_all_users() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function user_exists($username) {
      $db = db_connect();
      $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
      $statement->execute([$username]);
      return $statement->fetchColumn() > 0;
    }
  public function create_user($username, $password) {
    $db = db_connect();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    return $statement->execute([$username, $hashedPassword]);
  }

  public function verify_user($username, $password) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = ?");
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
      return true;
    }
    return false;
  }
  }
?>
