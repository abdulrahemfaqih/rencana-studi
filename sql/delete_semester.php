<?php
require_once "conn_db.php";

$id = 3;
$sql = "DELETE FROM semester WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
