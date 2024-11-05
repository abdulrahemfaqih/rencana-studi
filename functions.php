<?php
function checkLogin($data, &$errors)
{
  $username = $data["username"];
  $password = $data["password"];

  $result = mysqli_query(DB, "SELECT * FROM user WHERE username = '$username' AND password = SHA2('$password', 256)");

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION["user"] = $user;
    $_SESSION["role"] = ($user["role"] == '1') ? "Admin" : "User";
    return header("Location: index.php");
  } else {
    $errors[] = "Username atau password salah";
    return;
  }
}
