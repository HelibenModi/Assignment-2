<?php
require_once('user.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = new User();
  if ($user->verify_user($username, $password)) {
    $_SESSION['username'] = $username;
    echo "Successfully logged in.<br>Welcome, $username!";
    exit();
  } else {
    echo "Invalid credentials.";
  }
}
?>

<form method="POST">
  <label>Username:</label><br>
  <input type="text" name="username" required><br>
  <label>Password:</label><br>
  <input type="password" name="password" required><br>
  <button type="submit">Login</button>
</form>