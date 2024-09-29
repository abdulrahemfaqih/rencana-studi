<?php
$title = "Matakuliah";
$page = "matakuliah";
include_once "../layout/header.php";


$matakuliahs = getAllDataMatakuliah();


?>
<?php
include_once "../layout/header.php"
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
                    <th>Prasyarat</th>
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
                        <td><?= $matkul["nama_prasyarat"] ?? "-" ?></td>
                        <td><?= $matkul["jenis"]?></td>
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

<style>
    .table {
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
    }

    .table th,
    .table td {
        border: none;
        padding: 12px 15px;
    }

    .table thead tr {
        background-color: #f8f9fa;
        color: #333;
        text-align: left;
    }

    .table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .btn-sm {
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
    }
</style>

<?php
include_once "../layout/footer.php"
?>
<?php
include_once "../layout/footer.php"

?>