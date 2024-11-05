<?php
require_once "conn_db.php";

// select all
// $sql = "SELECT * FROM semester";
// $result = mysqli_query($conn, $sql);

// // select nama
// $sql = "SELECT nama FROM semester";
// $result = mysqli_query($conn, $sql);

// // select by id
$sql = "SELECT * FROM semester WHERE id = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row['id'] . ", nama: " . $row['nama'] . "<br>";
  }
} else {
  echo "0 results";
}
