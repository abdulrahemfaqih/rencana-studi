<?php
$title = "Tambah Rencana Studi";
$page = "rencana_studi";
include_once("../layout/header.php");


if (isset($_GET["semester"])) {
    $semester = $_GET["semester"];
    $matakuliahs = getDataMatakuliahBySemester($semester);
    $bobotNilais = getBobotNilai();
}


if (isset($_POST["simpanRencanaStudi"])) {
    $data = [
        "semester_id" => $semester,
        "deskripsi" => $_POST["deskripsi"],
        "matakuliah_id" => $_POST["matakuliah_id"],
        "bobot_nilai_id" => $_POST["bobot_nilai_id"],
        "user_id" => $_POST["user_id"]
    ];

    if (insertDataRencanaStudi($data)) {
        echo "<script>
            alert('Rencana Studi berhasil disimpan');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Rencana Studi gagal disimpan');
            window.location.href = 'add.php';
        </script>";
    }
}

?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 pt-5">
        <h3>Tambahkan Matakuliah untuk Rencana Studi Semester <?= $semester ?></h3>
    </div>

    <form action="" method="post" id="formKRS">
        <input type="hidden" name="semester" value="<?= $semester ?>">

        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="krsTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Matakuliah</th>
                        <th>Target Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="krsBody">
                    <tr class="krs-row">
                        <td>1</td>
                        <td>
                            <select class="form-select" name="matakuliah_id[]" aria-label="Pilih Matakuliah" onchange="updateSKS()" required>
                                <option value="" selected>Pilih Matakuliah</option>
                                <?php foreach ($matakuliahs as $matkul) : ?>
                                    <option value="<?= $matkul["id"] ?>" data-sks="<?= $matkul['sks'] ?>"><?= $matkul["nama_matakuliah"] ?> | <?= $matkul['sks'] ?> SKS</option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="bobot_nilai_id[]" aria-label="Pilih Target Nilai" onchange="updateIPK()" required>
                                <option value="" selected>Pilih Target Nilai</option>
                                <?php foreach ($bobotNilais as $bobotNilai) : ?>
                                    <option value="<?= $bobotNilai["id"] ?>" data-bobot="<?= $bobotNilai['bobot'] ?>"><?= $bobotNilai['predikat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger removeBtn">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Baris untuk menampilkan total SKS dan IP -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <strong>Total SKS:</strong> <span id="totalSKS">0</span>
            </div>
            <div>
                <strong>IP:</strong> <span id="totalIPK">0.00</span>
            </div>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label fw-bold">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <!-- Tombol untuk menambah mata kuliah dan menyimpan KRS -->
        <button type="button" class="btn btn-primary " id="addMataKuliah">Tambah Mata Kuliah</button>
        <button type="submit" class="btn btn-success" name="simpanRencanaStudi">Simpan Rencana Studi</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Fungsi untuk menambah baris baru
        $('#addMataKuliah').click(function() {
            let rowCount = $('#krsBody tr').length + 1;
            let newRow = $('.krs-row:first').clone();


            newRow.find('select').val('');


            newRow.find('td:first').text(rowCount);


            $('#krsBody').append(newRow);
        });


        $(document).on('click', '.removeBtn', function() {
            if ($('#krsBody tr').length > 1) {
                $(this).closest('tr').remove();
                updateSKS();
                updateIPK();
            } else {
                alert('Anda harus memiliki setidaknya satu mata kuliah.');
            }
        });
    });


    function updateSKS() {
        let totalSKS = 0;
        $('select[name="matakuliah_id[]"]').each(function() {
            let selectedOption = $(this).find('option:selected');
            if (selectedOption.val()) {
                totalSKS += parseInt(selectedOption.data('sks'));
            }
        });
        $('#totalSKS').text(totalSKS);
    }


    function updateIPK() {
        let totalBobot = 0;
        let totalSKS = 0;

        $('select[name="matakuliah_id[]"]').each(function(index) {
            let selectedMatkul = $(this).find('option:selected');
            let selectedNilai = $('select[name="bobot_nilai_id[]"]').eq(index).find('option:selected');

            if (selectedMatkul.val() && selectedNilai.val()) {
                let sks = parseInt(selectedMatkul.data('sks'));
                let bobot = parseFloat(selectedNilai.data('bobot'));

                totalSKS += sks;
                totalBobot += (sks * bobot);
            }
        });

        let totalIPK = totalSKS ? (totalBobot / totalSKS).toFixed(2) : 0.00;
        $('#totalIPK').text(totalIPK);
    }
</script>

<?php
include_once("../layout/footer.php");
