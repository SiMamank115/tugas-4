<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2021 Company, Inc</p>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="<?= base_url()?>home" class="nav-link nav-bottom-link pill-1 active px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="<?= base_url()?>about" class="nav-link nav-bottom-link pill-2 px-2 text-muted">About</a></li>
            <li class="nav-item"><a href="<?= base_url()?>peoples" class="nav-link nav-bottom-link pill-3 px-2 text-muted">Peoples</a></li>
        </ul>
    </footer>
</div>
</div>
<script>
    const activePill = <?= $pill?>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?= asset_url() ?>js/script.js"></script>
</body>

</html>