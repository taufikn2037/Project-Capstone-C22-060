<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Tgl. Pengaduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <?php foreach ($data_pengaduan as $dp) : ?>
                <tbody>
                    <tr class="text-center">
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $dp['name__user']; ?></td>
                        <td><?= $dp['no_telepon']; ?></td>
                        <td><?= $dp['isi_laporan']; ?></td>
                        <td>
                            <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
                        </td>
                        <td><?= $dp['tgl_pengaduan']; ?></td>
                        <td>
                            <?php
                            if ($dp['status'] == '0') {
                                echo '<span class="badge badge-secondary">Sedang Diverifikasi</span>';
                            } elseif ($dp['status'] == 'proses') {
                                echo '<span class="badge badge-primary">Sedang Diproses</span>';
                            } elseif ($dp['status'] == 'selesai') {
                                echo '<span class="badge badge-success">Selesai Dikerjakan</span>';
                            } elseif ($dp['status'] == 'tolak') {
                                echo '<span class="badge badge-danger">Pengaduan Ditolak</span>';
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($admins['id_role'] == '1') { ?>
                                <?= form_open('admin/pengaduan_detail'); ?>
                            <?php } else {  ?>
                                <?= form_open('petugas/pengaduan_detail'); ?>
                            <?php } ?>
                            <input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
                            <button class="btn btn-success" name="terima">Lihat Detail</button>
                            <?= form_close(); ?>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>