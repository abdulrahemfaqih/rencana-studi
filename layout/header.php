<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/praktikum-paw/pertemuan-6/config.php");
include_once(BASEPATH .  "/database.php");

$currentMenu = isset($_GET['menu']) ? $_GET['menu'] : basename($_SERVER["REQUEST_URI"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/style.css">
    <title>Rencana Studi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="pembungkus container py-2">
            <a class="navbar-brand fw-bold text-secondary visible" href="index.php">Rencana Studi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentMenu == 'home' || $currentMenu == basename($_SERVER["REQUEST_URI"])) ? 'text-light fw-bold' : '' ?>" href="index.php?menu=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentMenu == 'rencana_studi') ? 'text-light fw-bold' : '' ?>" href="rencana_studi/index.php?menu=rencana_studi">Rencana Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentMenu == 'matakuliah') ? 'text-light fw-bold' : '' ?>" href="matakuliah/index.php?menu=matakuliah">Matakuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentMenu == 'report') ? 'text-light fw-bold' : '' ?>" href="report.php?menu=report">Report</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-<?= ($currentMenu == 'profile') ? 'light fw-bold' : 'secondary'; ?>">None</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item bg-danger" href="#" onclick="return confirm('apakah anda yakin ingin logout')">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>