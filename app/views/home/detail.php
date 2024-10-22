<div class="container-fluid detail-blog">
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6 img-detail">
                <img src="<?= BASEURL ?>/img/<?= $data['blog']['gambar'] ?>" class="d-block mx-lg-auto img-fluid shadow-lg" alt="<?= $data['blog']['judul'] ?>" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $data['blog']['judul'] ?></h1>
                <p class="lead"><?= $data['blog']['deskripsi'] ?>.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-sm px-4 me-md-2 mt-3"
                        fdprocessedid="47xge1">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>