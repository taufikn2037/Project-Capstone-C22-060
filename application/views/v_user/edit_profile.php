<div class="modal fade" id="kelolaProfil" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form id="update-profile-form">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        Ubah Profil
                    </h4>
                    <button type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <figure class="profile-pic-div">
                            <img class="img-fluid mb-2 mx-auto d-block" src="https://res.cloudinary.com/dzskwtwm7/image/upload/v1669220512/user/user_quy29n.webp" id="photo">
                        </figure>
                        <label for="file" class="uploadBtn" hidden="">Foto</label>
                        <input type="file" accept="image/png, image/jpeg, image/webp" class="form-control" id="file" name="file">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="kev" required="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="kev@gmail.com" required="">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-danger-color col-5" data-bs-toggle="modal" data-bs-target="#hapusAkun">Hapus
                        Akun</button>
                    <button type="submit" class="btn btn-primary btn-primary-color col-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>