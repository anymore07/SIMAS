    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">DATA ABSEN</h3>
                        <h6 class="font-weight-normal mb-0">WEB DEV | SIMAS</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hari ini (11 Mar 2023)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-main">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Lokasi</th>
                                        <th>Waktu Absen</th>
                                        <th>Keterangan</th>
                                        <th>Lihat Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data['kehadiran'] as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td> <?= $row['nisn'] ?></td>
                                            <td> <?= $row['nama'] ?> </td>
                                            <td> <?= $row['lokasi'] ?> </td>
                                            <td> <?= $row['attend_at'] ?> </td>
                                            <td><button type="button" class="btn btn-<?= $row['bs-class'] ?> btn-rounded btn-fw"><?= $row['keterangan'] ?></button></td>
                                            <td><button type="button" class="btn btn-inverse-success btn-fw">Lihat Bukti</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>