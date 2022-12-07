<?= $this->session->flashdata('msg'); ?>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <?php foreach ($data_pengaduan as $dp) : ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $dp['tgl_pengaduan']; ?></td>
                        <td><?= $dp['isi_laporan']; ?></td>
                        <td>
                            <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
                        </td>
                        <td>
                            <?php
                            if ($dp['status'] == '0') {
                                echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
                            } elseif ($dp['status'] == 'proses') {
                                echo '<span class="badge badge-primary">Sedang di proses</span>';
                            } elseif ($dp['status'] == 'selesai') {
                                echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                            } elseif ($dp['status'] == 'tolak') {
                                echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>

                        <td class="text-center">
                            <a href="<?= base_url('user/pengaduan_detail/' . $dp['id_pengaduan']) ?>" class="btn btn-success"><i class="fas fa-fw fa-eye"></i></a>
                            <?php if ($dp['status'] == '0') : ?>
                                <a href="<?= base_url('user/pengaduan_batal/z' . $dp['id_pengaduan']) ?>" class="btn btn-warning">Hapus</a>
                                <a href="<?= base_url('user/edit/' . $dp['id_pengaduan']) ?>" class="btn btn-info">Edit</a>
                        </td>
                    <?php else : ?>
                        <td><small>Tidak ada aksi</small></td>
                    <?php endif; ?>

                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>