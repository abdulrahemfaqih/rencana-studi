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

function insertDataMatakuliah($data) {
    $namaObat = htmlspecialchars($data["namaMatakuliah"]);
    $sks = htmlspecialchars($data["sks"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $prasyaratId = !empty($data["prasyarat_id"]) ? (int)htmlspecialchars($data["prasyarat_id"]) : "NULL";
    $tahunAjaran = htmlspecialchars($data["tahunAjaran"]);
    $jenis = htmlspecialchars($data['jenis']);

    $query = "
    INSERT INTO
        matakuliah
            (nama, sks, deskripsi, prasyarat_id, tahun_ajaran, jenis)
    VALUES
        ('$namaObat', '$sks', '$deskripsi', $prasyaratId , '$tahunAjaran', '$jenis')
    ";
    return mysqli_query(DB, $query);
}

function hapusDataMatakuliah($id_matakuliah) {
    $query  = "DELETE FROM matakuliah WHERE id = $id_matakuliah";
    return mysqli_query(DB, $query);
}

function getDataMatakuliahById($id) {
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


function editDataMatakuliah($data) {
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
