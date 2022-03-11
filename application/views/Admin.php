<div class="p-5 mb-4 mt-4 jumbotron-container rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold hero-text">Hallo <?= ucfirst($_GET["id"]) ?></h1>
        <div class="d-flex mb-3 justify-content-between">
            <p class="col-md-8 fs-4">Ini adalah Halaman admin!</p>
            <button class="btn btn-outline-primary" onclick="modalFormTambah()" type="button" data-bs-toggle="modal" data-bs-target="#modal1">Tambah Partner</button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $e) : ?>
                    <tr>
                        <th scope="row"><?= $e["id"] ?></th>
                        <td><?= ucfirst($e["nama"]) ?></td>
                        <td><?= $e["tanggal_lahir"] ?></td>
                        <td><?= $e["pekerjaan"] ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary" type="button" onclick='detailPartner(<?= json_encode($this->db->query("SELECT * FROM partner WHERE id = ?", array($e["id"]))->row()) ?>)' data-bs-toggle="modal" data-bs-target="#modal1">Detail</button>
                            <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal1" onclick='deletePartner(<?= $e["id"] ?>)'>Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<style>
    .jumbotron-container {
        background-color: #fcf0c8;
        color: #912028;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modalLabel1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel1"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    const ucfirst = ([first, ...rest], locale = navigator.language) => first.toLocaleUpperCase(locale) + rest.join('')

    function detailPartner(data) {
        let innerText = `<div class="card-body">
                        <h5 class="card-title">${ucfirst(data["nama"])}</h5>
                        <h6 class="card-subtitle mb-4 text-muted">${data["pekerjaan"]}</h6>
                        <div class="card-text">
                        <p>Lahir pada ${data["tanggal_lahir"]}. Menyukai hal seperti ${data["hobi"]}</p>
                        <p class="fst-italic">${data["moto"]}</p>
                        </div>
                </div>`
        document.querySelector(".modal-body").innerHTML = innerText;
        document.querySelector(".modal-title").textContent = "Detail Partner";
    }

    function modalFormTambah() {
        let innerText = `
        <form method="post" action="<?= base_url() ?>admin">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="user_id" value="<?= $_GET["id"] ?>">
            <input type="hidden" name="user_pass" value="<?= $_GET["pass"] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
            </div>
            <div class="mb-3">
                <label for="hobi" class="form-label">Hobi</label>
                <input type="text" class="form-control" name="hobi" id="hobi">
            </div>
            <div class="mb-3">
                <label for="moto" class="form-label">Moto</label>
                <textarea type="text" class="form-control" name="moto" id="moto"></textarea>
            </div>
            <button type="submit" name="tambah" value="true" class="btn btn-primary float-end">Tambah</button>
        </form>`
        document.querySelector(".modal-body").innerHTML = innerText;
        document.querySelector(".modal-title").textContent = "Tambah Partner";
    }

    function deletePartner(id) {
        let innerText = `
        <div class="container flex-wrap justify-content-center d-flex">
            <p class="fs-3 col-12 text-center fw-bold text-danger">Apakah Anda Yakin?</p>
            <button class="btn btn-outline-danger" onclick="redirect('<?= base_url() ?>admin/hapus/${id}?id=<?= $_GET["id"] ?>&pass=<?= $_GET["pass"] ?>')">Ya</button>
        </div>`
        document.querySelector(".modal-body").innerHTML = innerText;
        document.querySelector(".modal-title").textContent = "Hapus Partner";
    }
</script>