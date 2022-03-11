<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=asset_url()?>css/style.css">
    <link rel="shortcut icon" href="<?= asset_url() ?>img/icon.svg" type="image/x-icon">
    <title><?= $tittle ?></title>
</head>

<body>
    <div class="container-lg px-4">
    <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-2 mx-4 bg-none">
        <div class="container-fluid h-100">
            <a class="navbar-brand d-flex" href="#"><img src="<?= asset_url() ?>img/icon.svg" alt="icon" width="25" class="me-1"> CV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link px-3 nav-top-link pill-1" href="<?=base_url()?>home">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link px-3 nav-top-link pill-2" href="<?=base_url()?>about">About</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link px-3 nav-top-link pill-3" href="<?=base_url()?>peoples">Peoples</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>