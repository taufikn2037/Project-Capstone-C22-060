<!DOCTYPE html>
<html>

<head>
  <title>Login SuaraQita</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/login.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/login_responsif.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
  <main>
    <section class="_login">
      <form class="user" method="POST" action="<?= base_url('login'); ?>">
        <div class="title">
          <h1>Login</h1>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="input">
          <h2>Username</h2>
          <input placeholder="" id="username__user" name="username__user" class="form-control" type="text" value="<?= set_value('username__user'); ?>">
        </div>
        <?= form_error('username__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="input">
          <h2>Password</h2>
          <input placeholder="" id="password__user" name="password__user" class="form-control" type="password">
        </div>
        <?= form_error('password__user', '<small class="text-danger pl-3">', '</small>') ?>
        <div class="b_login">
          <a href="<?= base_url('beranda') ?>" id="batal">Batal</a>
          <button id="login" type="submit" value="submit">Login</button>
        </div>
        <div class="login">
          <a href="<?= base_url('login/daftar') ?>"> Belum Punya Akun?</a>
        </div>
      </form>
    </section>
  </main>
</body>

</html>