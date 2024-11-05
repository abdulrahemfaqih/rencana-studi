<?php
$title = "Detail Rencana Studi";
$page = "rencana_studi";
include_once "../layout/header.php";

$id = $_GET['id'];
if (!isset($id)) {
  header('Location: index.php');
  exit;
}

$detailRencanaStudi = getAllDetailRencanaStudiById($id);
$rencanaStudi = getRencanaStudiById($id);
?>

<div class="container">

  <!-- Header -->
  <div class="d-flex justify-content-center align-items-center mb-4 pt-5">
    <h1>Detail Rencana Studi <?= $rencanaStudi['semester'] ?></h1>
  </div>

  <!-- Content -->
  <div class="table-responsive mt-3">
    <table class="table table-hover table-bordered" id="krsTable">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama Matakuliah</th>
          <th>Jumlah SKS</th>
          <th>Predikat</th>
          <th>Bobot Nilai</th>
        </tr>
      </thead>
      <tbody id="krsBody">
        <?php $no = 1; ?>
        <?php foreach ($detailRencanaStudi as $row): ?>
          <tr class="krs-row">
            <td><?= $no++ ?></td>
            <td><?= $row['matakuliah'] ?></td>
            <td><?= $row['sks'] ?></td>
            <td><?= $row['predikat'] ?></td>
            <td><?= $row['bobot'] ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <!-- Footer -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <strong>Total SKS:</strong> <span id="totalSKS"><?= $rencanaStudi['total_sks'] ?></span>
    </div>
    <div>
      <strong>IP:</strong> <span id="totalIPK"><?= number_format($rencanaStudi['target_ip'], 2) ?></span>
    </div>
  </div>

  <!-- Button Back -->
  <div class="mb-3">
    <a href="index.php" class="btn btn-primary">&laquo; Kembali</a>
  </div>
</div>

<?php include_once "../layout/footer.php"; ?>