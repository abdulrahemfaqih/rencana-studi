<?php
require_once 'conn_db.php';

// $sql = "INSERT INTO semester VALUES (NULL, 1, 'Semester 1');";

$sql = "INSERT INTO semester VALUES (NULL, 2, 'Semester 2');";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
