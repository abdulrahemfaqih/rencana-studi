<?php
$title = "Detail Rencana Studi";
$page = "rencana_studi";
include_once "../layout/header.php";

$id = $_GET['id'];
if (!isset($id)) {
  header('Location: index.php');
  exit;
}

$matakuliah = getDataMatakuliahById($id);
?>

<div class="container">

  <!-- Header -->
  <div class="d-flex justify-content-center align-items-center mb-4 pt-5">
    <h1>Detail Matakuliah <?= $matakuliah['nama_matakuliah'] ?></h1>
  </div>

  <div class="d-flex justify-content-center">
    <div class="card" style="min-width: 32rem;">
      <div class="card-body text-center">
        <h4 class="card-title"><?= $matakuliah['nama_matakuliah'] ?></h4>
        <p class="card-text"><?= $matakuliah['deskripsi'] ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Jumlah SKS: <?= $matakuliah['sks'] ?></li>
        <li class="list-group-item">Tahun Ajaran: <?= $matakuliah['tahun_ajaran'] ?></li>
        <li class="list-group-item">Jenis Matakuliah: <span class="badge text-bg-success"><?= $matakuliah['jenis'] ?></span></li>
        <li class="list-group-item">Matakuliah Prasyarat: <?= $matakuliah['prasyarat_id'] ?? "-" ?></li>
      </ul>
      <div class="card-body">
        <a href="index.php" class="card-link">&laquo; Kembali</a>
      </div>
    </div>
  </div>

</div>

<?php include_once "../layout/footer.php"; ?>