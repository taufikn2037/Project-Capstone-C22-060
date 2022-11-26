<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/beranda.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/beranda_responsif.css">
    <title>Homepage SuaraQita</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <img class="navbar-brand" src="<?= base_url('assets') ?> /dist/img/logo-image.png">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-1">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-3">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-2">Alur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-4">Galeri</a>
                </li>
                <button class="btn btn-warning nav-link mx-2" type="button">Login</button>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="jumbotron-text d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-4 p-4 fw-bold">Selamat Datang <br>Di <span>Suara</span>Qita</h1>
            <p class="lead border-3 border-top border-light">Sistem Pengaduan Masyarakat Kota Bandar Lampung.</p>
        </div>
    </div>

    <section class="py-5" id="content-1">
        <div class="container py-5">
            <div class="row g-4 py-2">
                <div class="col-md-6">
                    <h2 class="pb-2">Apa itu website Suara<span>Qita</span>?</h2>
                    <p>Aplikasi SuaraQita merupakan aplikasi yang dapat
                        digunakan oleh masyarakat untuk menyampaikan
                        pengaduan atau keluhan dari pelayanan publik yang
                        ada.</p>

                    <p>Aplikasi ini dapat diakses melalui website sehingga dapat
                        digunakan di perangkat apapun dan msayarakat dapat
                        melakukan pengaduan atau keluhan dimanapun dan
                        kapanpun.</p>
                </div>
                <div class="col-md-6 text-center about-text">
                    <img class="about-image mx-auto" src="<?= base_url('assets') ?> /dist/img/about-image.png" alt="About Image">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="content-2">
        <div class="container pb-4">
            <h3 class="text-center py-5 fw-bold">Alur Pengaduan</h3>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5 g-4 text-center">
                <div class="col-sm">
                    <div class="box mx-auto">
                        <img class="pb-3" src="<?= base_url('assets') ?>/dist/img/alur-1.png" alt="Langkah Pertama">
                        <h5 class="fw-bold">Daftar/Masuk</h5>
                        <p> Daftar/Masuk terlebih
                            dahulu untuk melaporkan
                            keluhan atau pengaduan
                            anda</p>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="box mx-auto">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-2.png" alt="Langkah Kedua">
                        <h5 class="fw-bold">Tulis Laporan</h5>
                        <p> Laporkan keluhan atau
                            aduan anda dengan
                            jelas dan lengkap</p>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="box mx-auto">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-3.png" alt="Langkah Ketiga">
                        <h5 class="fw-bold">Tindak Lanjut</h5>
                        <p> Laporan anda akan
                            diverifikasi dan diteruskan
                            kepada pihak berwenang</p>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="box mx-auto">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-4.png" alt="Langkah Keempat">
                        <h5 class="fw-bold">Tanggapan</h5>
                        <p> Anda akan mendapatkan
                            tanggapan atau balasan
                            dari petugas</p>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="box mx-auto">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-5.png" alt="Langkah Kelima">
                        <h5 class="fw-bold">Selesai</h5>
                        <p> Laporan anda akan terus
                            ditindaklanjuti hingga
                            terselesaikan</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5" id="content-3">
        <div class="container-lg py-3">
            <h3 class="text-center py-4 fw-bold">Berita</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">

                <?php $i = 0;
                foreach ($articles as $value) { ?>

                    <div class="col-md-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?= $value['urlToImage'] ?>" onerror="this.src='<?= base_url('assets/'); ?>public/images/sample-img1.jpeg'" alt="Contoh berita">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['title']  ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $value['publishedAt']  ?></h6>
                                <p class="card-text"><?= $value['description']  ?></p>
                                <div class="text-end">
                                    <a href="<?= $value['url']  ?>" aria-label="Read More" target="_blank">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    if (++$i > 5) break;
                } ?>

            </div>
        </div>
    </section>

    <section class="py-5" id="content-4">
        <div class="container-lg pb-4">
            <h3 class="text-center py-4 fw-bold">Galeri</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                <div class="col-md-4">
                    <img src="<?= base_url('assets') ?> /dist/img/gallery-1.png" alt="Galeri Pertama">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets') ?> /dist/img/gallery-2.png" alt="Galeri Kedua">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets') ?> /dist/img/gallery-3.png" alt="Galeri Ketiga">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets') ?> /dist/img/gallery-4.png" alt="Galeri Keempat">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets') ?> /dist/img/gallery-5.png" alt="Galeri Kelima">
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets') ?> /dist/img/gallery-6.png" alt="Galeri Keenam">
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="text-center">
            <img src="<?= base_url('assets') ?> /dist/img/logo-image.png" alt="logo image">
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>