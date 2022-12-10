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
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_pengaduan as $dp) : ?>
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
                    <td class="text-center">
                        <a href="<?= base_url('user/pengaduan_detail/' . $dp['id_pengaduan']) ?>" class="btn btn-success mb-1">Detail</a>
                        <?php if ($dp['status'] == '0') { ?>
                            <a href="<?= base_url('user/pengaduan_batal/' . $dp['id_pengaduan']) ?>" class="btn btn-danger mb-1">Hapus</a>
                            <a href="<?= base_url('user/edit/' . $dp['id_pengaduan']) ?>" class="btn btn-warning mb-1">Edit</a>
                    </td>
                <?php } ?>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>