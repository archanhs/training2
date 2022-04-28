<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url("assets/style.css") ?>">
    <title><?= $page ?></title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse py-2" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= ($page == 'Informasi Umum') ? "active" : "" ?>" aria-current="page" href="<?= base_url() ?>">A.1 Informasi Umum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($page == 'Format Dasar Payroll') ? "active" : "" ?>" aria-current="page" href="<?= base_url('form4') ?>">A.2 Format Dasar Payroll</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">A.3 Format PTKP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">A.4 Format BPJS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">A.5 PPh 21</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">A.6 Ketentuan Jam Kerja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($page == 'Kategori Posisi') ? "active" : "" ?>" aria-current="page" href="<?= base_url('form3') ?>">A.7 Kategori Posisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($page == 'Informasi Khusus') ? "active" : "" ?>" aria-current=" page" href="<?= base_url('form2') ?>">A.8 Informasi Khusus</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SDM
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item <?= ($page == 'Input Sdm Tahap 1') ? "active" : "" ?>" href="<?= base_url('sdm/formsdm') ?>">A.1 Input SDM Tahap 1</a></li>
                                <li><a class="dropdown-item <?= ($page == 'List Sdm') ? "active" : "" ?>" href="<?= base_url('sdm/listsdm') ?>">List SDM</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>