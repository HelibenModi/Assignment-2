<?php
require_once('user.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  $user = new User();

  if ($user->user_exists($username)) {
    echo "Username already taken.";
  } elseif (strlen($password) < 10) {
    echo "Password must be at least 10 characters.";
  } elseif ($password !== $confirm) {
    echo "Passwords do not match.";
  } else {
    $user->create_user($username, $password);
    echo "Account created successfully.";
  }
}
?>

<form method="POST">
  <label>Username:</label><br>
  <input type="text" name="username" required><br>
  <label>Password:</label><br>
  <input type="password" name="password" required><br>
  <label>Confirm Password:</label><br>
  <input type="password" name="confirm" required><br>
  <button type="submit">Register</button>
</form>