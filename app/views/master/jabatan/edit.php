<form action="<?= BASEURL ?>jabatan/ubahData" method="post">
    <div class="edit">
        <input type="hidden" name="id_jabatan" id="id_jabatan">
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" required>
        </div>
        <div class="mb-3">
            <label for="nama_yang_menjabat" class="form-label">Nama Yang Menjabat</label>
            <input type="text" class="form-control" name="nama_yang_menjabat" id="nama_yang_menjabat" required>
        </div>
    </div>