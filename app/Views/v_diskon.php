<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('failed')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('failed') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<table class="table datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nominal (Rp)</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($diskon as $i => $d): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $d['tanggal'] ?></td>
            <td><?= number_format($d['nominal']) ?></td>
            <td>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#editModal-<?= $d['id'] ?>">Ubah</button>
                <a href="<?= base_url('diskon/delete/' . $d['id']) ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal-<?= $d['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="post" action="<?= base_url('diskon/update/' . $d['id']) ?>">
                        <?= csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Diskon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" value="<?= $d['tanggal'] ?>" class="form-control"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="number" name="nominal" value="<?= $d['nominal'] ?>" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Edit Modal -->
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="<?= base_url('diskon/store') ?>">
                <?= csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Diskon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Modal -->

<?= $this->endSection() ?>