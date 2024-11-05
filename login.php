<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: index.php");
}

include_once($_SERVER["DOCUMENT_ROOT"] . "/rencana-studi/config.php");
include_once(BASEPATH .  "/database.php");
include_once(BASEPATH . "/functions.php");

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  checkLogin($_POST, $errors);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= BASEURL ?>/assets/login.css">
  <title>Login Page</title>
</head>

<body>
  <div class="login-form">
    <h2>Login</h2>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <input type="submit" value="Login" class="btn btn-primary">
    </form>

    <?php
    if (!empty($errors)) {
      echo '<div class="alert alert-danger mt-4" role="alert">';
      foreach ($errors as $error) {
        echo $error . '<br>';
      }
      echo '</div>';
    }
    ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>