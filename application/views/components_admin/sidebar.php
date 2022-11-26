<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <span>Administrator |</span>
            <a href="#" class="btn btn-warning font-weight-bold" role="button" aria-pressed="true">Logout</a>
        </li>
    </ul>   
  </nav>
 
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <strong class="brand-text font-weight-bold">Suara<span class="text-warning">Qita</span></strong>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url('index.php/admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('index.php/admin/kelola_pengaduan') ?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Kelola Pengaduan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('index.php/admin/ekspor_data') ?>" class="nav-link">
              <i class="nav-icon fas fa-share-square"></i>
              <p>Ekspor Data</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('index.php/admin/data_masyarakat') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masyarakat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/admin/data_petugas') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Petugas</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a class="text-warning" href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content">
      <div class="container-fluid">