<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Flash Messages -->
<?php if (session()->getFlashData('success')) : ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= esc(session()->getFlashData('success')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= esc(session()->getFlashData('failed')) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- Tombol Tambah -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<!-- Table -->
<table id="KategoriTable" class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kategori as $index => $item) : ?>
        <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <td><?= esc($item['name']) ?></td>
            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#editModal-<?= $item['id'] ?>">
                    Ubah
                </button>
                <a href="<?= base_url('kategori/delete/' . $item['id']) ?>" class="btn btn-danger"
                    onclick="return confirm('Yakin hapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal-<?= $item['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="<?= base_url('kategori/edit/' . $item['id']) ?>" method="post"
                        enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name-<?= $item['id'] ?>">Nama</label>
                                <input type="text" name="name" id="name-<?= $item['id'] ?>" class="form-control"
                                    value="<?= esc($item['name']) ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('kategori') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Kategori"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Styles & Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#KategoriTable').DataTable({
        pageLength: 10,
        language: {
            lengthMenu: "_MENU_ data per halaman",
            search: "",
            searchPlaceholder: "Cari..."
        }
    });
});
</script>

<?= $this->endSection() ?>