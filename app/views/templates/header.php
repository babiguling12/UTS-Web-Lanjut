<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul'] ?> Page</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">
    <script src="https://kit.fontawesome.com/6ca4aca43a.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg shadow">
        <div class="container-fluid">
        <a class="navbar-brand col-lg-3 ms-5 fs-4" href="<?= BASEURL ?>">Payu <span>Melali</span>.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex ms-4" id="navbarsExample11">
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= BASEURL ?>">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="<?= BASEURL ?>/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

