<?php
require_once "conn_db.php";

$stmt = $conn->prepare("INSERT INTO bobot_nilai (predikat, bobot) VALUES (?, ?)");
$stmt->bind_param("sd", $predikat, $bobot);

$predikat = "A";
$bobot = 4.0;
$stmt->execute();

$predikat = "B+";
$bobot = 3.5;
$stmt->execute();

$predikat = "B";
$bobot = 3.0;
$stmt->execute();

$predikat = "C+";
$bobot = 2.5;
$stmt->execute();

$predikat = "C";
$bobot = 2.0;
$stmt->execute();

$predikat = "D";
$bobot = 1.0;
$stmt->execute();

$predikat = "E";
$bobot = 0.0;
$stmt->execute();

echo "New records created successfully";

$stmt->close();
