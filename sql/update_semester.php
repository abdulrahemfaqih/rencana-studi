<?php
require_once "conn_db.php";

$id = 3;
$namaBaru = "Semester 5";
$sql = "UPDATE semester SET nama = '$namaBaru' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
  echo "Record updated succesfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
