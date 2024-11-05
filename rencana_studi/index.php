<?php
$title = "Rencana Studi";
$page = "rencana_studi";
include_once "../layout/header.php";

$role = $_SESSION['role'];
$rencanaStudi = $role == 'Admin' ? getDataRencanaStudi() : getRencanaStudiByUser($_SESSION['user']['id']);
?>

<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Rencana Studi</h2>
        <form action="add.php" method="get" class="d-flex">
            <select name="semester" class="form-select me-2" required>
                <option value="" disabled selected>Pilih Semester</option>
                <?php for ($i = 1; $i <= 8; $i++): ?>
                    <option value="<?php echo $i; ?>">Semester <?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <?php if (empty($rencanaStudi)): ?>
        <p>Belum ada rencana studi.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($rencanaStudi as $rencana) : ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="read.php?id=<?= $rencana['id'] ?>" class="text-decoration-none">
                        <div class="card-box bg-blue">
                            <div class="inner">
                                <h3><?= $rencana["kode_semester"] ?></h3>
                                <p>Total SKS <?= $rencana['total_sks'] ?> | <?= number_format($rencana['target_ip'], 2) ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa fa-book"></i>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>


        </div>
    <?php endif; ?>
</div>

<?php include_once "../layout/footer.php"; ?>