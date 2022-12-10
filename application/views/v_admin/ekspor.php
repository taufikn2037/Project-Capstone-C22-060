<div class="card">
    <div class="card-header">
        <a href="#" class="btn btn-outline-secondary">Print</a>
        <a href="#" class="btn btn-outline-secondary">PDF</a>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Laporan</th>
                    <th>Tgl. Pengaduan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Tgl. Tanggapan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
				<?php foreach($data_masyarakat as $dp) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
						<td><?= $dp['name__user'] ?></td>
                        <td><?= $dp['nik__user'] ?></td>
                        <td><?= $dp['isi_laporan'] ?></td>
                        <td><?= $dp['tgl_pengaduan'] ?></td>
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
                        <td><?= $dp['tanggapan'] ?></td>
                        <td><?= $dp['tgl_tanggapan'] ?></td>
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
    </div>
</div>