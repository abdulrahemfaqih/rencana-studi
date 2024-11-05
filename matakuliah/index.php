<?php
$title = "Matakuliah";
$page = "matakuliah";
include_once "../layout/header.php";

$matakuliahs = getAllDataMatakuliah();
?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 pt-5">
        <h3>Daftar Matakuliah</h3>
        <a href="<?= BASEURL ?>/matakuliah/add.php" class="btn btn-primary">Tambah Matakuliah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matakuliahs as $nomor => $matkul) :  ?>
                    <tr>
                        <td><?= $nomor + 1 ?></td>
                        <td><?= $matkul["nama_matakuliah"] ?></td>
                        <td><?= $matkul["sks"] ?></td>
                        <td><?= $matkul["tahun_ajaran"]  ?></td>
                        <td><?= $matkul["jenis"] ?></td>
                        <td>
                            <div class="d-flex" style="gap: 5px;">
                                <a href="edit.php?id=<?= $matkul['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?= $matkul["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus matakuliah ini?')">Hapus</a>
                                <a href="read.php?id=<?= $matkul['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php
include_once "../layout/footer.php"
?>