<div class="p-5 mb-4 mt-4 jumbotron-container rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold hero-text"></h1>
        <p class="col-md-8 fs-4">Selamat Datang! Ini adalah Portfolio saya yang dibuat dengan tujuan tugas dari sekolah. Pindah ke page selanjutnya untuk Melihat bio saya!</p>
        <button class="btn custom-btn-outline btn-lg" type="button" onclick="redirect('<?= base_url() ?>about')">Disini</button>
    </div>
</div>
<style>
    .jumbotron-container {
        background-color: #912028;
        /* background-color: #640b11; */
        color: #fcf0c8;
    }

    .custom-btn-outline {
        color: #face7f;
        border-color: #face7f;
    }

    .custom-btn-outline:hover {
        color: #640b11;
        background-color: #face7f;
        border-color: #face7f;
    }
</style>