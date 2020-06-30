<?php
if (isset($_POST['login-submit'])) {

  require('config.inc.php');

  if (!empty($_POST['uid']) && isset($_POST['password'])) {
    $uid = mysqli_real_escape_string($db, $_POST['uid']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $correct = check_credentials($uid, $password, $db);
    die();
  } else {
    header("Location: ../login.php?error=empty");
    exit();
  }
} else {
  // Return the user to the login page if tried to access this page without a POST method
  header('Location: ../login.php');
  die();
}


function check_credentials($uid, $password, $db)
{

  $sql = "SELECT * FROM users WHERE username = ? OR email = ? ;";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('ss', $uid, $uid);
  $stmt->execute();
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {
      session_start();
      $_SESSION['userID'] = $row['userID'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['img'] = $row['img'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['occ'] = $row['occupation'];
      $_SESSION['logged_in'] = true;
      header("Location: ../login.php?login=success");
      exit();
    } else {
      header("Location: ../login.php?error=incorrectpass");
      die();
    }
  } else {
    header("Location: ../login.php?error=notexist");
    die();
  }

  $db->close();
}
