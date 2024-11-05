<?php
$title = "Report";
$page = "report";
include_once "layout/header.php";

$role = $_SESSION['role'];

$matakuliah = $role == 'Admin' ? getAllDetailRencanaStudi() : getAllDetailRencanaStudi($_SESSION['user']['id']);
$dataIP = $role == 'Admin' ? getDataRencanaStudi() : getRencanaStudiByUser($_SESSION['user']['id']);
$labels = [];
$values = [];

foreach ($dataIP as $data) {
  $labels[] = $data['semester'];
  $values[] = $data['target_ip'];
}

if ($matakuliah) {
  $totalSks = array_sum(array_column($matakuliah, 'sks'));
  $IPK = array_sum(array_column($matakuliah, 'bobot')) / count($matakuliah);
}
?>


<div class="container my-4">
  <h2>Cetak Laporan</h2>

  <div class="row mt-5">
    <div class="col-md-6">
      <h5>Grafik IP</h5>
      <?php if ($matakuliah): ?>
        <canvas id="ipTargetChart"></canvas>
      <?php else: ?>
        <p>Belum ada data matakuliah.</p>
      <?php endif ?>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-8">
      <h5>Transkrip Nilai</h5>
      <?php if ($matakuliah): ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Semester</th>
              <th>Matakuliah</th>
              <th>SKS</th>
              <th>Predikat</th>
              <th>Bobot</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($matakuliah as $mk) : ?>
              <tr>
                <td><?= $mk['semester']; ?></td>
                <td><?= $mk['matakuliah']; ?></td>
                <td><?= $mk['sks']; ?></td>
                <td><?= $mk['predikat']; ?></td>
                <td><?= $mk['bobot']; ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="2">Total SKS</td>
              <td colspan="3"><?= $totalSks; ?></td>
            </tr>
            <tr>
              <td colspan="2">IPK</td>
              <td colspan="3"><?= number_format($IPK, 2); ?></td>
            </tr>
          </tbody>
        </table>
        <a href="pdf.php" class="btn btn-primary">Cetak PDF</a>
      <?php else: ?>
        <p>Belum ada data matakuliah.</p>
      <?php endif ?>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Create the chart
  const labels = <?= json_encode($labels); ?>;
  const values = <?= json_encode($values); ?>;


  const ctx = document.getElementById('ipTargetChart').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Indeks Prestasi Semester',
        data: values,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


<?php
include_once "layout/footer.php";
?>