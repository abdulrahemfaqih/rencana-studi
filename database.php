<?php
include_once("config.php");

/**
 * MATAKULIAH MODEL
 */
function getAllDataMatakuliah()
{
    $query = "
    SELECT
        m1.id,
        m1.nama as nama_matakuliah,
        m1.sks,
        m1.deskripsi,
        m1.tahun_ajaran,
        m2.nama as nama_prasyarat,
        m1.prasyarat_id,
        m1.jenis
    FROM
        matakuliah m1
    LEFT JOIN
        matakuliah m2 ON m1.prasyarat_id = m2.id
    ";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getNamaMatakuliahs()
{
    $query = "
    SELECT
        matakuliah.id,
        matakuliah.nama
    FROM
        matakuliah
    ";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function insertDataMatakuliah($data)
{
    $namaObat = htmlspecialchars($data["namaMatakuliah"]);
    $sks = htmlspecialchars($data["sks"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $prasyaratId = !empty($data["prasyarat_id"]) ? (int)htmlspecialchars($data["prasyarat_id"]) : "NULL";
    $tahunAjaran = htmlspecialchars($data["tahunAjaran"]);
    $jenis = htmlspecialchars($data['jenis']);
    $semester = htmlspecialchars($data['semester_id']);

    $query = "
    INSERT INTO
        matakuliah
            (nama, sks, deskripsi, prasyarat_id, tahun_ajaran, jenis, semester_id)
    VALUES
        ('$namaObat', '$sks', '$deskripsi', $prasyaratId , '$tahunAjaran', '$jenis', $semester)
    ";
    return mysqli_query(DB, $query);
}

function hapusDataMatakuliah($id_matakuliah)
{
    $query  = "DELETE FROM matakuliah WHERE id = $id_matakuliah";
    return mysqli_query(DB, $query);
}

function getDataMatakuliahById($id)
{
    $query = "
    SELECT
        m1.id,
        m1.nama as nama_matakuliah,
        m1.sks,
        m1.deskripsi,
        m1.tahun_ajaran,
        m1.prasyarat_id,
        m1.jenis
    FROM
        matakuliah m1
    LEFT JOIN
        matakuliah m2 ON m1.prasyarat_id = m2.id
    WHERE m1.id = $id
    ";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getDataMatakuliahBySemester($semester)
{
    $query = "
    SELECT
        m1.id,
        m1.nama as nama_matakuliah,
        m1.sks,
        m1.deskripsi,
        m1.tahun_ajaran,
        m2.nama as nama_prasyarat,
        m1.prasyarat_id,
        m1.jenis
    FROM
        matakuliah m1
    LEFT JOIN
        matakuliah m2 ON m1.prasyarat_id = m2.id
    WHERE m1.semester_id = $semester
    ";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}


function editDataMatakuliah($data)
{
    $id = $data["id"];
    $namaObat = htmlspecialchars($data["namaMatakuliah"]);
    $sks = htmlspecialchars($data["sks"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $prasyaratId = !empty($data["prasyarat_id"]) ? (int)htmlspecialchars($data["prasyarat_id"]) : "NULL";
    $tahunAjaran = htmlspecialchars($data["tahunAjaran"]);
    $jenis = htmlspecialchars($data['jenis']);

    $query = "
    UPDATE
        matakuliah
    SET
        nama = '$namaObat',
        sks = '$sks',
        deskripsi = '$deskripsi',
        prasyarat_id = $prasyaratId,
        tahun_ajaran = '$tahunAjaran',
        jenis = '$jenis'
    WHERE
        id = $id
    ";
    return mysqli_query(DB, $query);
}

function getSksMatakuliahById($id)
{
    $query = "
    SELECT
        sks
    FROM
        matakuliah
    WHERE
        id = $id
    ";
    return mysqli_query(DB, $query)->fetch_assoc();
}


// ===================== END OF MATAKULIAH MODEL =====================

/**
 * Bobot Nilai Model
 */

function getBobotNilai()
{
    $query = "
        SELECT
            id,
            predikat,
            bobot
        FROM
            bobot_nilai
    ";

    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}


function getBobotNilaiById($id)
{
    $query = "
            SELECT
                bobot
            FROM
                bobot_nilai
            WHERE
                id = $id
        ";

    return mysqli_query(DB, $query)->fetch_assoc();
}

// ===================== END OF BOBOT MDOEL =====================


/**
 *  Semester Model

 */

function getSemesters()
{
    $query = "
        SELECT
            id,
            kode_semester,
            nama
        FROM
            semester
    ";

    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

/**
 * Rencana Studi Model
 */


function getDataRencanaStudi()
{
    $query = "
        SELECT
            rencana_studi.id,
            semester.nama as semester,
            semester.kode_semester,
            rencana_studi.total_sks,
            rencana_studi.target_ip,
            rencana_studi.deskripsi
        FROM
            rencana_studi
        JOIN
            semester ON rencana_studi.semester_id = semester.id
    ";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getRencanaStudiByUser($user_id)
{
    $query = "
        SELECT
            rencana_studi.id,
            semester.nama as semester,
            semester.kode_semester,
            rencana_studi.total_sks,
            rencana_studi.target_ip,
            rencana_studi.deskripsi
        FROM
            rencana_studi
        JOIN
            semester ON rencana_studi.semester_id = semester.id
        JOIN
            user ON user.id = rencana_studi.user_id
        WHERE
            user.id = $user_id
    ";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getRencanaStudiById($id)
{
    $query = "
        SELECT
            rencana_studi.id,
            semester.nama as semester,
            semester.kode_semester,
            rencana_studi.total_sks,
            rencana_studi.target_ip,
            rencana_studi.deskripsi
        FROM
            rencana_studi
        JOIN
            semester ON rencana_studi.semester_id = semester.id
        WHERE
            rencana_studi.id = $id
    ";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getAllDetailRencanaStudi($id = '')
{
    $query = "
        SELECT 
            semester.nama semester,
            matakuliah.nama matakuliah,
            matakuliah.sks,
            bobot_nilai.predikat,
            bobot_nilai.bobot
        FROM
            detail_rencana_studi
        JOIN 
            bobot_nilai ON detail_rencana_studi.bobot_nilai_id = bobot_nilai.id
        JOIN
            matakuliah ON detail_rencana_studi.matakuliah_id = matakuliah.id
        JOIN
            rencana_studi ON detail_rencana_studi.rencana_studi_id = rencana_studi.id
        JOIN
            semester ON rencana_studi.semester_id = semester.id
    ";

    if ($id) {
        $query .= " WHERE rencana_studi.user_id = $id";
    }

    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getAllDetailRencanaStudiById($id)
{
    $query = "
        SELECT 
            semester.nama semester,
            matakuliah.nama matakuliah,
            matakuliah.sks,
            bobot_nilai.predikat,
            bobot_nilai.bobot
        FROM
            detail_rencana_studi
        JOIN 
            bobot_nilai ON detail_rencana_studi.bobot_nilai_id = bobot_nilai.id
        JOIN
            matakuliah ON detail_rencana_studi.matakuliah_id = matakuliah.id
        JOIN
            rencana_studi ON detail_rencana_studi.rencana_studi_id = rencana_studi.id
        JOIN
            semester ON rencana_studi.semester_id = semester.id
        WHERE
            detail_rencana_studi.rencana_studi_id = $id
    ";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function insertDataRencanaStudi($data)
{
    $user_id = $data["user_id"];
    $semester = $data["semester_id"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $matakuliahIds = $data["matakuliah_id"];
    $bobotNilaiIds = $data["bobot_nilai_id"];

    $totalSKS = 0;
    $totalBobot = 0;


    foreach ($matakuliahIds as $index => $matkulId) {
        $sks = getSksMatakuliahById($matkulId);
        $bobot = getBobotNilaiById($bobotNilaiIds[$index]);

        $totalSKS += $sks["sks"];
        $totalBobot += $bobot["bobot"] * $sks["sks"];
    }

    if ($totalSKS > 24) {
        echo "<script>
            alert('Total SKS melebihi batas maksimal');
            window.location.href = 'add.php?semester=$semester';
        </script>";
        return false;
    } else {
        $targetIPK = $totalBobot / $totalSKS;
    }

    $query = "
        INSERT INTO
            rencana_studi
                (semester_id, total_sks, target_ip, deskripsi, user_id)
        VALUES
            ($semester, $totalSKS, $targetIPK, '$deskripsi', $user_id)
    ";
    if (!mysqli_query(DB, $query)) {
        return false;
    }
    $rencanaStudiId = mysqli_insert_id(DB);

    foreach ($matakuliahIds as $index => $matkulId) {
        $bobotNilaiId = $bobotNilaiIds[$index];
        $query = "
            INSERT INTO
                detail_rencana_studi
                    (rencana_studi_id, matakuliah_id, bobot_nilai_id)
            VALUES
                ($rencanaStudiId, $matkulId, $bobotNilaiId)
        ";
        if (!mysqli_query(DB, $query)) {
            return false;
        }
    }
    return true;
}
