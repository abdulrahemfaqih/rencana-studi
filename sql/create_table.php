<?php
require_once "conn_db.php";

// Create Table Bobot Nilai
// $sql = "CREATE TABLE bobot_nilai(
//   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   predikat VARCHAR(2),
//   bobot FLOAT
// );";

// if (mysqli_query($conn, $sql)) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: " . mysqli_error($conn);
// }

// Create Table Semester
// $sql = "CREATE TABLE semester(
//   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   kode_semester CHAR(1),
//   nama VARCHAR(10)
// );";

// // Create Table User
// $sql .= "CREATE TABLE user(
//   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   nim VARCHAR(12),
//   nama VARCHAR(50),
//   username VARCHAR(50),
//   password VARCHAR(250),
//   role ENUM('1', '2')
// );";

// if (mysqli_multi_query($conn, $sql)) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: " . mysqli_error($conn);
// }

// // Create Table Matakuliah
// $sql = "CREATE TABLE matakuliah(
//   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   nama VARCHAR(50),
//   sks INT,
//   deskripsi TEXT,
//   prasyarat_id INT,
//   tahun_ajaran ENUM('ganjil', 'genap'),
//   jenis ENUM('wajib', 'pilihan'),
//   semester_id INT,
//   FOREIGN KEY (semester_id) REFERENCES semester(id),
//   FOREIGN KEY (prasyarat_id) REFERENCES matakuliah(id)
// );";

// // Create Table Rencana Studi
// $sql .= "CREATE TABLE rencana_studi(
//   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   semester_id INT,
//   total_sks INT,
//   target_ip FLOAT,
//   deskripsi TEXT,
//   user_id INT,
//   FOREIGN KEY (semester_id) REFERENCES semester(id),
//   FOREIGN KEY (user_id) REFERENCES user(id)
// );";

// // Create Table Detail Rencana Studi
// $sql .= "CREATE TABLE detail_rencana_studi(
//   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   matakuliah_id INT,
//   rencana_studi_id INT,
//   bobot_nilai_id INT,
//   FOREIGN KEY (rencana_studi_id) REFERENCES rencana_studi(id),
//   FOREIGN KEY (matakuliah_id) REFERENCES matakuliah(id),
//   FOREIGN KEY (bobot_nilai_id) REFERENCES bobot_nilai(id)
// );";

// if (mysqli_multi_query($conn, $sql)) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: " . mysqli_error($conn);
// }
