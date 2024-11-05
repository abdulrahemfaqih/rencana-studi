<?php
$title = "Edit Matakuliah";
$page = "matakuliah";

include_once("../layout/header.php");

if (isset($_GET["id"])) {
    $id =  $_GET['id'];
    $matakuliah = getDataMatakuliahById($id);
    $matakuliahs = getAllDataMatakuliah();
}

if (isset($_POST["submit"])) {
    if (editDataMatakuliah($_POST)) {
        echo "<script>
            alert('data berhasil diubah');
            window.location = '" . BASEURL . "/matakuliah';
        </script>";
    } else {
        echo "<script>
            alert('gagal diubah');
            window.location = '" . BASEURL . "/matakuliah/edit.php?id=$id';
        </script>";
    }
}





?>
<div class="container">
    <h2 class="py-4"><?= $title ?></h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $matakuliah['id'] ?> ">
        <div class="mb-3">
            <label for="namaMatakuliah" class="form-label">Nama Matakuliah</label>
            <input type="text" class="form-control" id="namaMatakuliah" name="namaMatakuliah" value="<?= $matakuliah['nama_matakuliah'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" required value="<?= $matakuliah['sks'] ?>">
        </div>
        <div class="mb-3">
            <label for="prasyarat" class="form-label">Prasyarat</label>
            <select class="form-select" name="prasyarat_id" aria-label="Default select example">
                <option disabled selected>Pilih Prasayarat Matakuliah</option>
                <option value="" <?= empty($matakuliah['prasyarat_id']) ? 'selected' : '' ?>>Tidak Ada</option>
                <?php foreach ($matakuliahs as $matkul) : ?>
                    <option value="<?= $matkul["id"] ?>" <?= $matkul['id'] === $matakuliah['prasyarat_id'] ? 'selected' : '' ?>><?= $matkul["nama_matakuliah"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"><?= $matakuliah["deskripsi"] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label fw-bold">Tahun Ajaran</label>
            <div class="d-flex" style="gap: 20px;">
                <div>
                    <input class="form-check-input" type="radio" value="ganjil" name="tahunAjaran" id="tahunAjaran1" <?= $matakuliah['tahun_ajaran'] == 'ganjil' ? 'checked' : "" ?>>
                    <label class="form-check-label" for="tahunAjaran1">
                        Ganjil
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" value="genap" name="tahunAjaran" id="tahunAjaran2" <?= $matakuliah['tahun_ajaran'] == 'genap' ? 'checked' : "" ?>>
                    <label class="form-check-label" for="tahunAjaran2">
                        Genap
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label fw-bold">Jenis</label>
            <div class="d-flex" style="gap: 20px;">
                <div>
                    <input class="form-check-input" type="radio" value="wajib" name="jenis" id="jenis1" <?= $matakuliah['jenis'] == "wajib" ? "checked" : "" ?>>
                    <label class="form-check-label" for="jenis1">
                        Wajib
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" value="pilihan" name="jenis" id="jenis2" <?= $matakuliah['jenis'] == "pilihan" ? "checked" : "" ?>>
                    <label class="form-check-label" for="jenis2">
                        Pilihan
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL ?>/matakuliah" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include_once("../layout/footer.php") ?>