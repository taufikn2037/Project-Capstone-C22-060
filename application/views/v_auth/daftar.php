<!DOCTYPE html>
<html>

<head>
  <title>Daftar SuaraQita</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/login.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/login_responsif.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
  <main>
    <section class="pendaftaran">
      <form class="user" method="POST" action="<?= base_url('login/daftar'); ?>">
        <div class="title">
          <h1>Daftar</h1>
        </div>
        <div class="input">
          <h2>Nama</h2>
          <input placeholder="" id="name__user" name="name__user" class="form-control" type="text" value="<?= set_value('name__user'); ?>">
        </div>
        <?= form_error('name__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="input">
          <h2>Email</h2>
          <input placeholder="" id="email__user" name="email__user" class="form-control" type="email" value="<?= set_value('email__user'); ?>">
        </div>
        <?= form_error('email__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="input">
          <h2>Username</h2>
          <input placeholder="" id="username__user" name="username__user" class="form-control" type="text" value="<?= set_value('username__user'); ?>">
        </div>
        <?= form_error('username__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="input">
          <h2>NIK</h2>
          <input placeholder="" id="nik__user" name="nik__user" class="form-control" type="number" value="<?= set_value('nik__user'); ?>">
        </div>
        <?= form_error('nik__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="input">
          <h2>Password</h2>
          <input placeholder="" id="password__user" name="password__user" class="form-control" type="password">
        </div>
        <?= form_error('password__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="input">
          <h2>Ulangi Password</h2>
          <input placeholder="" id="rpassword__user" name="rpassword__user" class="form-control" type="password">
        </div>
        <div class="b_daftar">
          <button id="daftar" type="submit">Daftar</button>
        </div>
        <div class="login">
          <a href="<?= base_url('login') ?>"> Sudah memiliki akun?</a>
        </div>
      </form>
    </section>
  </main>
</body>

</html>