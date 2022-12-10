<div class="main-body">

    <div class="col-md-5">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center mb-4">
                    <img src="<?= base_url() ?>assets/upload_foto/<?= $users['image']; ?>" alt="">
                    <div class="mt-3">
                        <h4><?= $users['username__user'] ?></h4>
                        <!-- <a href="/suaraQita/user/edit_profile/" class="btn btn-outline-primary">Edit Foto</a> -->
                        <a href="edit-foto" class="btn btn-outline-primary" role="button" data-target="#editModal" data-toggle="modal" aria-pressed="true">Edit Foto</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['name__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['email__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['no_telepon'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nomor Induk Kependudukan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['nik__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="" class="btn btn-outline-primary" role="button" data-target="#passModal" data-toggle="modal" aria-pressed="true">Ganti Password</a>
                        <a class="btn btn-info " target="__blank" href="">Edit</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?= form_open('user/edit_profile/') ?>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="update-profile-form">
                    <div class="modal-body">
                        <figure class="profile-pic-div">
                            <img src="<?= base_url() ?>assets/upload_foto/<?= $users['image']; ?>" alt="">
                        </figure>
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file border border-secondary rounded" name="image" id="image">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
    <?php form_close(); ?>

    <?= form_open('user/ganti_password/') ?>
    <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="update-profile-form">
                    <div class="modal-body">
                        <label for="password__user" class="col-sm-4 col-form-label">Password Lama</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password__user" name="password__user" placeholder="">
                        </div>
                        <label for="password__user" class="col-sm-4 col-form-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password__user" name="password__user" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
    <?php form_close(); ?>
</div>