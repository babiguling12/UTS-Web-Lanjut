<!-- banner  -->
<div class="container-fluid banner">
    <div class="container text-center">
        <h4 class="display-6 ">Selamat Datang di Website</h4>
        <h3 class="display-1 fw-semibold mb-4 name-website">Payu <span>Melali</span></h3>
        <p>Anda mempunyai rencana melali? bingung mau melali nya kemana? Tenang di"payu"kan aja😁👍<br>
            Website ini menyediakan informasi tentang berbagai tempat pariwisata di Bali</p>
    </div>
</div>
<!-- banner end  -->


<!-- blog section  -->
<div class="container-fluid blog py-5">
    <div class="container text-center">
        <h2 class="display-3">Blog</h2>
        <p class="lead">Informasi tempat pariwisata di bali</p>
        <div class="d-flex justify-content-end">
            <div class="input-group mb-2 mt-4" style="max-width: 300px; margin-right: 100px;">
                <input type="text" class="form-control" placeholder="Ketik judul artikel....">
                <button class="btn" type="button" id="button-addon2">Cari</button>
            </div>
        </div>

        <!-- card  -->
        <div class="row pt-5 g-4">
            <?php foreach ($data['blog'] as $blog): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= BASEURL ?>/img/<?= $blog['gambar'] ?>" class="card-img-top"
                            alt="<?= $blog['judul'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $blog['judul'] ?></h5>
                            <p class="card-text"><?= $blog['sub_judul'] ?></p>
                            <a href="<?= BASEURL ?>/home/detail/<?= $blog['id'] ?>" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- blog section end  -->