<?php
$title = "Tambah Matakuliah";
$page = "matakuliah";

include_once("../layout/header.php");
$matakuliahs = getNamaMatakuliahs();
$semesters = getSemesters();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["submit"])) {
        if (insertDataMatakuliah($_POST)) {
            header("Location: " . BASEURL . "/matakuliah/index.php");
        } else {
            echo "<script>
            alert('data gagal di tambahkan')
            </script>";
        }
    }
}
?>
<div class="container">
    <h2 class="py-4"><?= $title ?></h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="namaMatakuliah" class="form-label fw-bold">Nama Matakuliah</label>
            <input type="text" class="form-control" id="namaMatakuliah" name="namaMatakuliah" required>
        </div>
        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" required>
        </div>
        <div class="mb-3">
            <label for="prasyarat" class="form-label fw-bold">Prasyarat</label>
            <select class="form-select" name="prasyarat_id" aria-label="Default select example">
                <option disabled selected>Pilih Prasayarat Matakuliah</option>
                <option value="">Tidak Ada</option>
                <?php foreach ($matakuliahs as $matkul) : ?>
                    <option value="<?= $matkul["id"] ?>"><?= $matkul["nama"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label fw-bold">Semester</label>
            <select class="form-select" name="semester_id" aria-label="Default select example">
                <option disabled selected>Pilih Semester</option>
                <?php foreach ($semesters as $semester) : ?>
                    <option value="<?= $semester["id"] ?>"><?= $semester["nama"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label fw-bold">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label fw-bold">Tahun Ajaran</label>
            <div class="d-flex" style="gap: 20px;">
                <div>
                    <input class="form-check-input" type="radio" value="ganjil" name="tahunAjaran" id="tahunAjaran1" checked>
                    <label class="form-check-label" for="tahunAjaran1">
                        Ganjil
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" value="genap" name="tahunAjaran" id="tahunAjaran2">
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
                    <input class="form-check-input" type="radio" value="wajib" name="jenis" id="jenis1" checked>
                    <label class="form-check-label" for="jenis1">
                        Wajib
                    </label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" value="pilihan" name="jenis" id="jenis2">
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