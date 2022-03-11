<div class="container mt-4 jumbotron-container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <p class="mt-3 fs-1">List of Peoples</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="<?= base_url('peoples') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="john doe" aria-describedby="button-addon2" name="keyword" autocomplete="off" autofocus>
                            <input class="btn btn-outline-danger" type="submit" name="submit" id="button-addon2">
                        </div>
                    </form>
                </div>
            </div>
            <p class="fs-5">Result <?= $total_rows ?></p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peoples as $e) : ?>
                        <tr>
                            <th><?= $start++; ?></th>
                            <td><?= $e['nama'] ?></td>
                            <td><?= $e['email'] ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">detail</a>
                                <a href="#" class="btn btn-sm btn-success">edit</a>
                                <a href="#" class="btn btn-sm btn-danger">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <?php if (empty($peoples)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                                Tidak ditemukan
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<style>
    .jumbotron-container {
        background-color: #fcf0c8;
        border-radius: .5rem;
    }

    .custom-link-active {
        background-color: #912028 !important;
        border-color: #912028 !important;
    }

    .custom-link {
        color: #912028 !important;
    }
</style>