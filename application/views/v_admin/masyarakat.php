<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            foreach($data_masyarakat as $data) : ?>
              <tbody>
                  <tr>
                      <td><?= $data->nik__user ?></td>
                      <td><?= $data->name__user ?></td>
                      <td><?= $data->username__user ?></td>
                      <td><?= $data->email__user ?></td>
                      <td>
                          <a href="<?= base_url('admin/delete_masyarakat/' . $data->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                      </td>
                  </tr>
              </tbody>
          <?php endforeach ?>
        </table>
    </div>
</div>