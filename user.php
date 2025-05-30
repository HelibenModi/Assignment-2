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
  }
?>
