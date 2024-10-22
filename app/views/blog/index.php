<div class="container-fluid add-blog">

    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::getFlash() ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            <h3 class="display-5 py-3 ms-3">Manage Blog</h3>

            <!-- Button trigger modal -->
            <div class="row mb-3">
                <div class="col-lg-6 mt-4 ms-3">
                    <button type="button" class="btn tombolTambah" data-bs-toggle="modal" data-bs-target="#formModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <!-- end button trigger -->

            <!-- list group  -->
            <ol class="list-group list-group-numbered mt-4 ms-3">
                <?php foreach ($data['blog'] as $blog): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $blog['judul'] ?></div>
                            <div class="sub-judul"><?= $blog['sub_judul'] ?></div>
                        </div>
                        <div class="py-2">
                            <a href="#" class="badge text-bg-warning rounded-pill tampilModalEdit"
                                data-bs-target="#formModal" data-bs-toggle="modal" data-id="<?= $blog['id'] ?>">Edit</a>
                            <a href="#" class="badge text-bg-danger rounded-pill tampilModalHapus"
                                data-bs-target="#hapusModal" data-bs-toggle="modal" data-id="<?= $blog['id'] ?>">Hapus</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>
<!-- list group end  -->



<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/blog/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul...." autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="sub_judul" class="form-label">Sub Judul</label>
                        <input type="text" class="form-control" id="sub_judul" name="sub_judul"
                            placeholder="Masukan Sub Judul...." autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <img class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <div class="mb-3">
                            <img src="" alt="" id="img" width="200px">
                        </div>
                        <input class="form-control" type="file" id="gambar" name="gambar" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->




<!-- modal hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="judulHapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulHapus">Yakin ingin menghapus?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-bg-warning" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn text-bg-danger" id="confirmHapus">Yakin</button>
            </div>
        </div>
    </div>
</div>
<!-- modal hapus end -->